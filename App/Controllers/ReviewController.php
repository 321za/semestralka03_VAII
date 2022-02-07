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
        if (isset($_POST['text'])) {
            $new = new Review();
            $text = strip_tags($_POST['text']);
            $new->setText($text);
            $new->setAuthor($_SESSION['name']);
            $new->setEmail($_SESSION['login']);
            $new->save();

            $review = Review::getAll('email = ?', [$_SESSION['login']]);
            foreach ($review as $r) {
                $rText = $r->getText();
                if ($rText === $text) {
                    $id = $r->getId();
                    return $this->json('{"name":"' . $_SESSION['name'] . '", "id":"' . $id . '"}');
                }
            }


        } else {
            return $this->json('');
        }


    }

    public function deleteReview()
    {
        $delItem = intval($this->request()->getValue('deleteItem'));
        $delReview = Review::getOne($delItem);
        if (($delReview->getEmail() == $_SESSION['login']) || ($_SESSION['type']==2)) {
            //DELETE
            $delReview->delete();
            return $this->json('1');
        } else {
            return $this->json('0');
        }
    }

    public function editReview()
    {
        $editItem = intval($this->request()->getValue('editItem'));
        $text = $this->request()->getValue('text');
        $editReview = Review::getOne($editItem);
        if ($editReview->getEmail() == $_SESSION['login']) {
            $editReview->setText($text);
            $editReview->save();
            return $this->json('{"text":"' . $text . '"}');
        } else {
            return $this->json('');
        }
    }
}