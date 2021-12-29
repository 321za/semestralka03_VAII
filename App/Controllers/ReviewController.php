<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\Models\Reviews;

class ReviewController extends AControllerRedirect
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function addReview()
    {
        $text = $this->request()->getValue('mes');
        if (strlen($text) > 10) {
            $new = new Reviews();
            $new->setText($text);
            $new->setAuthor($_SESSION['name']);
            $new->save();
        }
        $this->redirect('home');
    }
}