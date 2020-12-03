<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyForms extends Model
{
    public function degree_type()
    {
        return $this->belongsTo(DegreeTypes::class, 'degree_id');
    }

    public function department_type()
    {
        return $this->belongsTo(DepartmentTypes::class, 'department_type_id');
    }
}
