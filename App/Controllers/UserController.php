<?php

namespace App\Controllers;

use App\Core\Responses\Response;
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

    public function calendar()
    {
        $this->redirect('home');
    }

}