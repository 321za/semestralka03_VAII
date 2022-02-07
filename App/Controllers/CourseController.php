<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\Courses;
use App\Models\Course;
use App\Models\ListOfUser;
use App\Models\User;

class CourseController extends AControllerRedirect
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function lekcieUprava()
    {
        return $this->html();
    }

    public function lekcie()
    {
        $courses = Course::getAll();
        return $this->html(
            ['warning' => $this->request()->getValue('warning'),
                'courses' => $courses]
        );
    }

    public function lekciePoleDance()
    {
        $courses = Course::getAll('typKurzu = ?', [1]);

        return $this->html(
            ['warning' => $this->request()->getValue('warning'),
                'courses' => $courses]
        );
    }

    public function lekcieAerialHoop()
    {
        $courses = Course::getAll('typKurzu = ?', [2]);

        return $this->html(
            ['warning' => $this->request()->getValue('warning'),
                'courses' => $courses]
        );
    }

    public function lekcieAerialSilk()
    {
        $courses = Course::getAll('typKurzu = ?', [3]);

        return $this->html(
            ['warning' => $this->request()->getValue('warning'),
                'courses' => $courses]
        );
    }

    public function lekcieFlexiJoga()
    {
        $courses = Course::getAll('typKurzu = ?', [4]);

        return $this->html(
            ['warning' => $this->request()->getValue('warning'),
                'courses' => $courses]
        );
    }


    public function lekcieNova()
    {
        $users = User::getAll();

        return $this->html(
            [
                'users' => $users]
        );
    }


    public function decreaseCapacity()
    {
        $idKurzu = $this->request()->getValue('id');
        $course = Course::getOne($idKurzu);
        $capacity = $course->getCapacity();
        if ($capacity > 0) {
            $user = $_SESSION['login'];
            if (Courses::accept($idKurzu, $user)) {
                $course->capacity -= 1;
                //UPDATE
                $course->save();
                $this->redirect('course', 'lekcie', ['warning' => 'Úspešne prihlásenie na hodinu.']);
            } else {
                $this->redirect('course', 'lekcie', ['warning' => 'Na hodinu si už prihlásený.']);
            }
        } else {
            $this->redirect('course', 'lekcie', ['warning' => 'Nie je už voľné miesto.']);
        }
    }


    public function increaseCapacity()
    {
        $idKurzu = $this->request()->getValue('id');
        $course = Course::getOne($idKurzu);
        $capacity = $course->getCapacity();
        $user = $_SESSION['login'];
        if (Courses::delete($idKurzu, $user)) {
            $course->capacity += 1;
            //UPDATE
            $course->save();
            $this->redirect('user', 'calendar', ['warning' => 'Úspešne odhlásenie.']);
        }
    }

    public function delete()
    {
        $id = $this->request()->getValue('id');
        $course = Course::getOne($id);
        //DELETE
        $course->delete();
        $this->redirect('course', 'lekcie');
    }

    public function update()
    {
        $id = $this->request()->getValue('id');
        $course = Course::getOne($id);
        $caption = $course->getCaption();
        $capacity = $course->getCapacity();
        $time = $course->getTime();
        $info = $course->getInfo();

        return $this->html([
            'id' => $id,
            'caption' => $caption,
            'info' => $info,
            'time' => $time,
            'capacity' => $capacity
        ], 'lekcieUprava');
    }

    public function ulozitZmeny()
    {
        $id = $this->request()->getValue('id');
        $course = Course::getOne($id);
        $caption = $this->request()->getValue('caption');
        $capacity = $this->request()->getValue('capacity');
        $time = $this->request()->getValue('time');
        $info = $this->request()->getValue('info');
        $course->setCaption($caption);
        $course->setCapacity($capacity);
        $course->setTime($time);
        $course->setInfo($info);
        //UPDATE
        $course->save();
        $this->redirect('course', 'lekcie');
        return $this->json('1');
    }

    public function pridat()
    {
        $caption = $this->request()->getValue('caption');
        $capacity = $this->request()->getValue('capacity');
        $time = $this->request()->getValue('time');
        $info = $this->request()->getValue('info');
        $typKurzu = $this->request()->getValue('typKurzu');
        $idTrenera = $this->request()->getValue('trener');
        $new = new Course();
        $new->setCapacity($capacity);
        $new->setCaption($caption);
        $new->setTime($time);
        $new->setInfo($info);
        $new->setTypKurzu($typKurzu);
        $new->setIdTrener($idTrenera);
        //INSERT
        $new->save();
        $this->redirect('course', 'lekcie');
    }


}