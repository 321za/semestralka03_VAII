<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\Models\Course;
use App\Models\ListOfUser;
use App\Models\User;

class UserController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function calendar()
    {
        $courses = ListOfUser::getAll('user = ?', [$_SESSION['login']]);
        $myclass = array();
        foreach ($courses as $c)
        {
            array_push($myclass,Course::getOne($c->getIdKurzu()));
        }

        return $this->html(
            [   'warning' => $this->request()->getValue('warning'),
                'courses' => $myclass]
        );
    }

    public function logout()
    {
        User::logout();
        $this->redirect('home');
    }

    public function deactivate()
    {
        User::deactivate();
        $this->redirect('home','index',['warning' => 'Účet bol úspešne deaktivovaný']);
    }


    public function admin()
    {
        $users = User::getAll();

        return $this->html(
            [
                'users' => $users]
        );
    }

    public function setNavstevnik()
    {
        $id = $this->request()->getValue('id');
        $user = User::getOne($id);
        $user->setType(0);
        $user->save();
        $this->redirect('user','admin');
    }

    public function setTrener()
    {
        $id = $this->request()->getValue('id');
        $user = User::getOne($id);
        $user->setType(1);
        $user->save();
        $this->redirect('user','admin');
    }

}