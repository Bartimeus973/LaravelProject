<?php

use Illuminate\Database\Seeder;

class AvatarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $avatars = factory(App\Avatar::class, 10)->create();  //Call 10 times the file database\factories\AvatarFactory.php
    }
}
