<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title'=>$faker->realText(50),
        'subtitle'=>$faker->realText(50),
        'text'=>$faker->realText(500),
        'created_at'=>$faker->dateTime()
    ];
});
