<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ticket;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
	$date_time = $faker->date.' '.$faker->time;
	$prios = ['low','normal','high'];
    $statuses =['0%','25%','50%','75%','100%'];
    return [
    	'content'=>$faker->text(),
    	'created_at' =>$date_time,
    	'updated_at' =>$date_time,
    	'prio' => $faker->randomElement($prios),
    	'status'=>$faker->randomElement($statuses)

        //
    ];
});
