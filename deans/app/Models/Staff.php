<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    public function english_level()
    {
        return $this->belongsTo(EnglishLevels::class, 'english_level_id');
    }


    public function academic_degree()
    {
        return $this->belongsTo(AcademicDegrees::class, 'academic_degree_id');
    }

    public function academic_rank()
    {
        return $this->belongsTo(AcademicRank::class, 'academic_rank_id');
    }

    public function payment_form()
    {
        return $this->belongsTo(PaymentForms::class, 'payment_form_id');
    }
}
