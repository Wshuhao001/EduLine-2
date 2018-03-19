<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'status', 'courses'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();
    }

    public function edit($fields)
    {
       $this->fill($fields);
       $this->password = bcrypt($fields['password']);
       $this->save();
    }

//    public function generatePassword($password)
//    {
//        if ($password != null)
//        {
//            $this->password = bcrypt($password);
//            $this->save();
//        }
//    }

    public function remove()
    {
        $this->delete();
    }

    public function uploadAvatar($image)
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
            return '/img/no-user-image.png';
        }

        return '/uploads/' . $this->image;
    }

    public function makeAdmin()
    {
        $this->is_admin = 1;
        $this->save();
    }
    public function makeNormal()
    {
        $this->is_admin = 0;
        $this->save();
    }

    public function toggleAdmin($value)
    {
        if ($value == null)
        {
            return $this->makeNormal();
        }

        return $this->makeAdmin();
    }

    public function makeTeacher()
    {
        $this->status = 1;
        $this->save();
    }

    public function addMoney($value)
    {
        $this->money = $this->money + $value;
        $this->save();
    }

    public function spendMoney($value)
    {
        if ($this->money - $value >= 0)
        {
            $this->money = $this->money - $value;
            $this->save();
        }

        return;
    }


    public function buyCourse($course_id)
    {
        if ($course_id == null) {return; }

        $courses = json_decode($this->courses);
        if ($courses == null) {
            $courses = array();
        }
        array_push($courses,$course_id);
        $courses = json_encode($courses);
        $this->courses = $courses;
        $this->save();
    }



}
