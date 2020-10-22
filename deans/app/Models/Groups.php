<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    public function students()
    {
        return $this->hasMany(Student::class, 'group_id');
    }

    public function departments()
    {
        return $this->belongsTo(Departments::class, 'dep_id');
    }

}
