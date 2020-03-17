<?php

use Illuminate\Database\Seeder;

class SpaceParkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SpacePark::class, 5)->create();
    }
}
