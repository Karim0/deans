<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login', 'password', 'lastname', 'patronymic', 'gender_id', 'tel', 'birthdate', 'registration_address', 'residential_address', 'iin',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'login_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_role');
    }

    public function my_groups()
    {
        return $this->belongsToMany(Groups::class, 'group_users');
    }

    public function departments()
    {
        return $this->belongsToMany(Departments::class, 'department_users', 'department_id', 'user_id');
    }

    public function staff()
    {
        return $this->hasOne(Staff::class, 'user_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'user_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function orders()
    {
        return $this->hasMany(StudentOrder::class, 'user_id');
    }

    public function isAdmin(): bool
    {
        return $this->roles()->allRelatedIds()->contains(1);
    }

    public function isAdvisor(): bool
    {
        return $this->roles()->allRelatedIds()->contains(2);
    }

    public function isStudent(): bool
    {
        return $this->roles()->allRelatedIds()->contains(3);
    }
}
