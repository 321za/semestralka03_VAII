<?php

namespace App;

use App\Models\ListOfUser;


class Courses
{

    public static function accept($idKurzu, $user)
    {
        $nasiel = false;
        $class = ListOfUser::getAll();
        foreach ($class as $c) {
            if ($c->getIdKurzu()==$idKurzu && $c->getUser()==$user)
            {
                $nasiel = true;
            }
        }
        if (!$nasiel) {
            $new = new ListOfUser();
            $new->setIdKurzu($idKurzu);
            $new->setUser($user);
            //INSERT
            $new->save();
            return true;
        } else {
            return false;
        }
    }

    public static function delete($idKurzu)
    {
        $courses = ListOfUser::getAll('user = ?', [$_SESSION['login']]);
        foreach ($courses as $c) {
            $cou = $c->getIdKurzu();
            if ($cou == $idKurzu) {
                $myclass = $c;
                $id = $myclass->getId();
                $user = ListOfUser::getOne($id);
                //DELETE
                $user->delete();
                return true;
            }
        }
        return false;
    }


}