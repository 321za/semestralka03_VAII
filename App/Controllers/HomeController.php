<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Models\Trainer;
use App\Core\DB\DebugStatement;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerRedirect
{

    public function index()
    {
        return $this->html(
            [
                'warning' => $this->request()->getValue('warning')
            ]
        );
    }

    public function trenerky()
    {
        $trainer = Trainer::getAll();
        return $this->html(
            ['trainers' => $trainer]
        );
    }


    //ako bolo na cviceni
    public function addStar()
    {
        $id = $this->request()->getValue('id');
        if ($id)
        {
            //SELECT
            $trainer = Trainer::getOne($id);
            $trainer->stars += 1;
            //UPDATE
            $trainer->save();
        }
        $this->redirect('home','trenerky');
    }

    public function kontakt()
    {
        return $this->html();
    }




}