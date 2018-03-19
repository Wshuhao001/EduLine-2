<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use GoogleSpeech\TextToSpeech;


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

    public function sound($id)
    {
        $speech = new TextToSpeech();
        $speech
            ->withLanguage('en-us')
            ->inPath('audios');


            $speech->withName('sound_word' . $id);
            $speech->download($this->word);

            return $speech->getCompletePath();

    }





}
