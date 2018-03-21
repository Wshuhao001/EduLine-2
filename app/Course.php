<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Category;

class Course extends Model
{
    protected $fillable = ['title','short_description', 'description', 'category_id', 'skills','requirements','price','bought'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function structure()
    {
        return $this->hasMany(Structure::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



    public static function add($fields)
    {
        $course = new static;
        $course->fill($fields);
        $course->user_id = Auth::user()->id;
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

        //Storage::delete('uploads/' . $this->image);
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads',$filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->image == null)
        {
            return '/img/no-course-img.jpg';
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
        $lesson->storeAs('videos',$filename);

        $videos = json_decode($this->structure);
        if ($videos == null) {
            $videos = array();
        }
        array_push($videos,$filename);
        $videos = json_encode($videos);
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




    public function getLesson()
    {
        if ($this->structure == null)
        {
            return;
        }

        $videos = json_decode($this->structure);

        return $videos;
    }

    public function uploadDemo($lesson)
    {

        if ($lesson == null) {return; }
        $filename = str_random(10) . '.' . $lesson->extension();
        $lesson->storeAs('videos',$filename);

        $this->demo = $filename;
        $this->save();
    }


    public function getDemo()
    {

        return '/videos/' . $this->demo;
    }


    public function getCategoryTitle()
    {
        if ($this->category != null) {
            return $this->category->title;
        }
    }


    public function buy($id)
    {
        $bought = json_decode($this->bought);
        if ($bought == null) {
            $bought = array();
        }
        array_push($bought,$id);
        $bought = json_encode($bought);
        $this->bought = $bought;
        $this->save();
    }

    public function checkPay($user_id)
    {
        if ($this->bought == null)
        {
            return;
        }

        $bought = json_decode($this->bought);


         if (in_array($user_id, $bought))
         {
             return true;
         }
         else
         {
             return false;
         }

    }

    public function checkTeacher()
    {
        if (Auth::user()->id == null)
        {
            return;
        }

        if ($this->user_id == Auth::user()->id)
        {
            return true;
        }
    }

    public function countStudents()
    {
        $students = json_decode($this->bought);
        if ($students != null)
        {
             return count($students);
        }
        else
        {
            return 0;
        }
    }

    public function courseBg()
    {
        if($this->category->group == 1)
        {
            return '/img/course-bg1.jpg';
        }

        if($this->category->group == 2)
        {
            return '/img/course-bg2.jpg';
        }

        if($this->category->group == 3)
        {
            return '/img/course-bg3.jpg';
        }
    }









}
