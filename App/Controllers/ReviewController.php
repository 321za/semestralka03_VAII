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
        /**$text = $this->request()->getValue('mes');
        if (strlen($text) > 10) {
            $new = new Review();
            $new->setText($text);
            $new->setAuthor($_SESSION['name']);
            //INSERT
            $new->save();
        }
        $this->redirect('home');**/
        if (isset($_POST['text'])) {
            $new = new Review();
            $text = strip_tags($_POST['text']);
            $new->setText($text);
            $new->setAuthor($_SESSION['name']);
            $new->save();
            return $this->json('{"name":"'.$_SESSION['name'].'"}');
        } else {
            return $this->json('');
        }


    }

    public function deleteReview()
    {
        $delItem = intval($this->request()->getValue('deleteItem'));
        $delReview = Review::getOne($delItem);
        if ($delReview->getAuthor() == $_SESSION['name'])
        {
            //DELETE
            $delReview->delete();
            return $this->json('1');
        } else {
            return $this->json('0');
        }
    }
}