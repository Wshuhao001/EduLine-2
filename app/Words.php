<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Words extends Model
{

    protected $fillable = ['word','translate'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }



    public function remove()
    {
        $this->delete();
    }
}
