<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ticket;
 use Carbon\Carbon;


class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_ids = ['1','2','3'];
        $faker = app(Faker\Generator::class);

        $tickets = factory(Ticket::class)->times(100)->make()->each(function
        	($ticket) use ($faker, $user_ids){
        		$ticket->user_id = $faker->randomElement($user_ids);

        	});
        Ticket::insert($tickets->toArray());
    }
}
