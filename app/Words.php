<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Words extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
