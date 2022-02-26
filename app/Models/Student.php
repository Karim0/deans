<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    public function status()
    {
        return $this->belongsTo(StudyStatuses::class, 'study_status_id');
    }

    public function study_form()
    {
        return $this->belongsTo(StudyForms::class, 'study_form_id');
    }

    public function payment_form()
    {
        return $this->belongsTo(PaymentForms::class, 'payment_form_id');
    }

    public function study_lang()
    {
        return $this->belongsTo(StudyLangs::class, 'study_lang_id');
    }

    public function group()
    {
        return $this->belongsTo(Groups::class, 'group_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
