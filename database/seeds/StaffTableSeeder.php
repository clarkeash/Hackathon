<?php

use Illuminate\Database\Seeder;
use OVH\Staff;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Staff::class, 50)->create();
    }
}
