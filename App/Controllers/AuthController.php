<?php

namespace App\Controllers;

use App\Auth;
use App\Core\Responses\Response;
use App\Models\User;
use const http\Client\Curl\AUTH_ANY;

//kontroler,ktory je zodpovedny za prihlasovanie

class AuthController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function registrationForm()
    {
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function loginForm()
    {
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function changePasswordForm()
    {
        return $this->html(
            [
                'error' => $this->request()->getValue('error'),
                'login' => $_SESSION['login']
            ]
        );
    }

    public function login()
    {
        //to co clovek vyplnil vo formulari
        $login = $this->request()->getValue('login');
        $password = $this->request()->getValue('password');

            //ci je uzivatel prihlaseny alebo nie
            $logged = Auth::login($login, $password);
            if ($logged) {
                //ak som prihlaseny vratim sa na home
                $this->redirect('home', 'index', ['warning' => 'Vitaj!']);
            } else {
                //loginView lebo chcem aby sa uzivatelovi ukazal formular znova
                $this->redirect('auth', 'loginForm', ['error' => 'Zlé meno alebo heslo']);
            }
        }


    public function registration()
    {
        $name = $this->request()->getValue('name');
        $surname = $this->request()->getValue('surname');
        if (Auth::validateName($name) && (Auth::validateName($surname))) {
        $login = $this->request()->getValue('login');
        //skontroluje spravnost emailu
        if (Auth::validateEmail($login)) {
            $password = $this->request()->getValue('password');
            //skontroluje ci je dostatocne heslo
            if (Auth::validatePassword($password)) {
                $passwordAgain = $this->request()->getValue('passwordAgain');
                //skontroluje rovnost hesiel
                if ($password == $passwordAgain) {
                    $registered = Auth::registation($name,$login, $password);
                    if ($registered) {
                        return $this->html(['error' => null,"login"=>$login],'loginForm');
                    } else {
                        $this->redirect('auth', 'registrationForm', ['error' => 'Nepodarilo sa zaregistrovat, email sa už používa.']);
                    }
                } else {
                    return $this->html( ['error' => 'Heslá sa nerovnajú.',"login"=>$login],'registrationForm');
                }
            } else {
                return $this->html( ['error' => 'Heslo je príliš slabé.',"login"=>$login],'registrationForm');
            }
        } else {
           return $this->html( ['error' => 'Email nie je správny.',"login"=>$login],'registrationForm');
        }
    } else {
            $this->redirect('auth', 'registrationForm', ['error' => 'Nespravny formát mena alebo priezviska.']);
        }
    }

    public function newPassword()
    {
        $login = $this->request()->getValue('login');
        $person = User::getAll('email = ?', [$login]);
        if ($person) {
            $password = $this->request()->getValue('password');
            if (Auth::validatePassword($password)) {
                $passwordAgain = $this->request()->getValue('passwordAgain');
                //skontroluje rovnost hesiel
                if ($password == $passwordAgain) {
                    $person[0]->setPassword($password);
                    //UPDATE
                    $person[0]->save();
                    return $this->html(['error' => "","login"=>$login],'loginForm');
                } else {
                    return $this->html( ['error' => 'Heslá sa nerovnajú.',"login"=>$login],'changePasswordForm');
                }
            } else {
                return $this->html( ['error' => 'Heslo je príliš slabé.',"login"=>$login],'changePasswordForm');
            }
        } else {
            $this->redirect('auth', 'changePasswordForm', ['error' => 'Užívateľ s daným emailom neexistuje']);
        }
    }

}