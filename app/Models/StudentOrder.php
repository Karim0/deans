<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentOrder extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cat()
    {
        return $this->belongsTo(StudentOrderCategories::class, 'order_cat_id');
    }


    public function status()
    {
        return $this->belongsTo(StudentOrderStatuses::class, 'status_id');
    }
}
