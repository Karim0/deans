<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'department_users', 'user_id', 'department_id');
    }

    public function groups()
    {
        return $this->hasMany(Groups::class, 'dep_id');
    }


    public function type()
    {
        return $this->belongsTo(DepartmentTypes::class, 'department_type_id');
    }

    public function parent()
    {
        return $this->belongsTo(Departments::class, 'parent_id');
    }

}
