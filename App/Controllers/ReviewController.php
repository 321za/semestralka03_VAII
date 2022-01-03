<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\Models\Review;

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
            $new = new Review();
            $new->setText($text);
            $new->setAuthor($_SESSION['name']);
            //INSERT
            $new->save();
        }
        $this->redirect('home');
    }

    public function deleteReview()
    {
        $id = $this->request()->getValue('id');
        $review = Review::getOne($id);
        if ($review->getAuthor() == $_SESSION['name'])
        {
            //DELETE
            $review->delete();
            $this->redirect('home');
        } else {
            $this->redirect('home', 'index', ['warning' => 'Môžeš mazať iba vlastné recenzie!']);
        }

    }
}