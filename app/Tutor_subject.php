<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor_subject extends Model
{
    protected $table = 'tutor_subjects';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
