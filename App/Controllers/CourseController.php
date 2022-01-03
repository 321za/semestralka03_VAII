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
            ['courses' => $courses]
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
        $capacity = $course->getId();
        if ($capacity > 0)
        {
            $course->capacity -= 1;
            //UPDATE
            $course->save();
        } else {
            //co ak kapacita je 0
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
    }

    public function pridat()
    {
        $caption = $this->request()->getValue('caption');
        $capacity = $this->request()->getValue('capacity');
        $time = $this->request()->getValue('time');
        $info = $this->request()->getValue('info');
        $new = new Course();
        $new->setCapacity($capacity);
        $new->setCaption($caption);
        $new->setTime($time);
        $new->setInfo($info);
        //INSERT
        $new->save();
        $this->redirect('course', 'lekcie');
    }



}