<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    protected $attributes = [
        'study_status_id',
        'user_id',
        'study_form_id',
        'study_lang_id',
        'course',
        'created_at',
        'updated_at'
    ];
}
