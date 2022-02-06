<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\Review;
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
        $reviews = Review::getAll();

        return $this->html(
            [
                'warning' => $this->request()->getValue('warning'),
                'reviews' => $reviews
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


    public function poleDance()
    {
        return $this->html();
    }

    public function aerialHoop()
    {
        return $this->html();
    }

    public function aerialSilk()
    {
        return $this->html();
    }

    public function flexiYoga()
    {
        return $this->html();
    }

    //ako bolo na cviceni
    public function addStar()
    {
        if ($_SESSION['hodnotenie'] == 0) {
            $id = $this->request()->getValue('id');
            if ($id) {
                //SELECT
                $trainer = Trainer::getOne($id);
                $trainer->stars += 1;
                //UPDATE
                $trainer->save();
            }
            $_SESSION['hodnotenie'] = 1;
        }
        $this->redirect('home','trenerky');
    }


    public function kontakt()
    {
        return $this->html();
    }






}