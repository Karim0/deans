<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    public function students()
    {
        return $this->belongsToMany(Student::class, 'students');
    }
}
