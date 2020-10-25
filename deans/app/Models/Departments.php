<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    public function groups()
    {
        return $this->hasMany(Groups::class, 'dep_id');
    }


    public function type()
    {
        return $this->hasOne(DepartmentTypes::class, 'department_type_id');
    }

}
