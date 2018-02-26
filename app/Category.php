<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','group'];

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
