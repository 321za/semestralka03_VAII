<?php

namespace App;

use App\Models\ListOfUser;


class Courses
{

    public static function accept($idKurzu, $user)
    {
        $person = ListOfUser::getAll('user = ?', [$user]);
        $class = ListOfUser::getAll('idKurzu = ?', [$idKurzu]);
        if (!($person && $class))
        {
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

    public static function delete($idKurzu, $user)
    {
        $courses = ListOfUser::getAll('user = ?', [$_SESSION['login']]);
        foreach ($courses as $c)
        {
            $cou = $c->getIdKurzu();
            if ($cou == $idKurzu)
            {
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