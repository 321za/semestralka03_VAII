<?php


namespace App;
use App\Models\User;


class Auth
{

    public static function newPassword($login, $password)
    {
                //SELECT
                $person = User::getAll('email = ?', [$login]);
                if ($person) {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $person[0]->setPassword($hash);
                    //UPDATE
                    $person[0]->save();
                    return true;
                } else {
                    return false;
                }
    }

    public static function registation($name, $login, $password)
    {
            $person = User::getAll('email = ?', [$login]);
            if (!$person)
            {
                $new = new User();
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $new->setPassword($hash);
                $new->setEmail($login);
                $new->setName($name);
                //INSERT
                $new->save();
                return true;
            } else {
                return false;
            }
    }


    //sem doplnit logiku na kontrolu hesla/mena!!!!!!!!!!!
    //ci je prihlaseny ak je ulozene meno
    //static nebudeme musiet vytvarat instanciu a budeme mat pristupnu logiku
    //SESSION je superglobalne pole ktore ostava aktivne na strane servera
    public static function login($login, $password)
    {
        //najde toho jedneho s rovnakym loginom
        //SELECT
        $person = User::getAll('email = ?', [$login]);
        if ($person)
        {
            if (($person[0]->getEmail() == $login) && (password_verify($password, $person[0]->getPassword())))
            {
                $_SESSION['login'] = $login;
                $_SESSION['id'] = $person[0]->id;
                $_SESSION['name'] = $person[0]->getName();
                $_SESSION['hodnotenie'] = 0;
                $_SESSION['type'] = $person[0]->getType();
                return true;
            } else {
                return false;
            }
        }
    }


    public static function validateName($name)
    {
        if ((ctype_alpha($name)))
        {
            return true;
        }
    }

    public static function validateEmail($login)
    {
        return preg_match("/^[a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3}$/i", $login);
    }

    public static function validatePassword($password)
    {
        if (((strlen($password) >9) && (ctype_alpha($password)))
            || ((strlen($password) >9) && (preg_match('/[a-zA-Z]/',$password)) && (preg_match('/[0-9]/',$password)))
            || ((strlen($password) > 8) && (preg_match('/[a-zA-Z]/',$password)) && (preg_match('/[0-9]/',$password)) && (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$password)))
        ) {
            return true;
        }

        if (((7 < strlen($password) && strlen($password) <=9) && (ctype_alpha($password)))
            || ((6 < strlen($password)) && strlen($password) <=9 && (preg_match('/[a-zA-Z]/',$password)) && (preg_match('/[0-9]/',$password)))
            || ((5 < strlen($password) && strlen($password) <= 8) && (preg_match('/[a-zA-Z]/',$password)) && (preg_match('/[0-9]/',$password)) && (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$password)))
        ) {
            return true;
        }

        if (((strlen($password) <=7) && (ctype_alpha($password)))
            || ((strlen($password) <=6) && (preg_match('/[a-zA-Z]/',$password)) && (preg_match('/[0-9]/',$password)))
            || ((strlen($password) <= 5) && (preg_match('/[a-zA-Z]/',$password)) && (preg_match('/[0-9]/',$password)) && (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$password)))
        )  {
            return false;
        }
    }
}