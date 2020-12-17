<?php

use Illuminate\Database\Seeder;

class NewsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\News::class, 50)->create();
    }
}
