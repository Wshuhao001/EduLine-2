<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    protected $fillable = ['title', 'description', 'skills','requirements'];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function author()
    {
        return $this->hasOne(User::class);
    }


    public function structure()
    {
        return $this->hasMany(Structure::class);
    }


    public static function add($fields)
    {
        $course = new static;
        $course->fill($fields);
        $course->user_id = 1;
        $course->save();

        return $course;
    }


    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        Storage::delete('uploads/' . $this->image);
        $this->delete();
    }

    public function uploadImage($image)
    {
        if ($image == null) {return; }

        Storage::delete('uploads/' . $this->image);
        $filename = str_random(10) . '.' . $image->extension();
        $image->saveAs('uploads',$filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->image == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->image;
    }

    public function setCategory($id)
    {
        if ($id = null) {return;}

        $this->category_id = $id;
        $this->save();

    }

    public function uploadLesson($lesson)
    {
        if ($lesson == null) {return; }
        $filename = str_random(10) . '.' . $lesson->extension();
        $lesson->saveAs('videos',$filename);
        $videos = json_decode($this->structure);
        array_push($videos,$filename);
        $videos = json_encode();
        $this->structure = $videos;
        $this->save();
    }


    public function removeLesson() // Видаляє ластовий урок
    {
        $videos = json_decode($this->structure);
        $lastVideo =  array_pop($videos);
        Storage::delete('videos/' . $lastVideo);
        $videos = json_encode();
        $this->structure = $videos;
        $this->save();
    }

    public function removeAllLessons() // Видаляє всі уроки
    {
        $videos = json_decode($this->structure);

        foreach ($videos as $video)
        {
            Storage::delete('videos/' . $video);
        }

        $this->structure = null;
        $this->save();
    }




    public function getLesson($id)
    {
        if ($this->structure == null)
        {
            return;
        }

        $videos = json_decode($this->structure);

        return '/videos/' . $videos[$id];
    }

    public function uploadDemo($lesson)
    {

        if ($lesson == null) {return; }
        $filename = str_random(10) . '.' . $lesson->extension();
        $lesson->saveAs('videos',$filename);

        $this->demo = $filename;
        $this->save();
    }


    public function getDemo()
    {
        if ($this->demo == null)
        {
            return '/img/no-demo.png';
        }

        return '/videos/' . $this->demo;
    }





}
