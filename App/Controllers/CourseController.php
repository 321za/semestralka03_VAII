<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use App\Models\Course;

class CourseController extends AControllerRedirect
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function lekcieUprava()
    {
        return $this->html(
        );
    }

    public function lekcie()
    {
        $courses = Course::getAll();
        return $this->html(
            [   'warning' => $this->request()->getValue('warning'),
                'courses' => $courses]
        );
    }

    public function lekciePoleDance()
    {
        $courses = Course::getAll('typKurzu = ?', [1]);

        return $this->html(
            [   'warning' => $this->request()->getValue('warning'),
                'courses' => $courses]
        );
    }

    public function lekcieAerialHoop()
    {
        $courses = Course::getAll('typKurzu = ?', [2]);

        return $this->html(
            [   'warning' => $this->request()->getValue('warning'),
                'courses' => $courses]
        );
    }

    public function lekcieAerialSilk()
    {
        $courses = Course::getAll('typKurzu = ?', [3]);

        return $this->html(
            [   'warning' => $this->request()->getValue('warning'),
                'courses' => $courses]
        );
    }

    public function lekcieFlexiJoga()
    {
        $courses = Course::getAll('typKurzu = ?', [4]);

        return $this->html(
            [   'warning' => $this->request()->getValue('warning'),
                'courses' => $courses]
        );
    }



    public function lekcieNova()
    {
        return $this->html(
        );
    }

    public function decreaseCapacity()
    {
        $id = $this->request()->getValue('id');
        $course = Course::getOne($id);
        $capacity = $course->getCapacity();
        if ($capacity > 0)
        {
            $course->capacity -= 1;
            //UPDATE
            $course->save();
        } else {
            $courses = Course::getAll();
            return $this->html( ['warning' => 'Nie je uz volne miesto.','courses' => $courses],'lekcie');
        }
        $this->redirect('course','lekcie');
    }

    public function delete()
    {
        $id = $this->request()->getValue('id');
        $course = Course::getOne($id);
        //DELETE
        $course->delete();
        $this->redirect('course','lekcie');

    }

    public function update()
    {
        $id = $this->request()->getValue('id');
        $course = Course::getOne($id);
        $caption = $course->getCaption();
        $capacity = $course->getCapacity();
        $time = $course->getTime();
        $info = $course->getInfo();

        return $this->html( [
            'id' => $id,
            'caption' => $caption,
            'info' => $info,
            'time' => $time,
            'capacity' => $capacity
        ],'lekcieUprava');
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
        $new = new Course();
        $new->setCapacity($capacity);
        $new->setCaption($caption);
        $new->setTime($time);
        $new->setInfo($info);
        $new->setTypKurzu($typKurzu);
        //INSERT
        $new->save();
        $this->redirect('course', 'lekcie');
    }



}