<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use OVH\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $user = new User;
        $user->email = 'user@example.com';
        $user->name = 'Example User';
        $user->type = 'customer';
        $user->save();

        $user = new User;
        $user->email = 'staff@example.com';
        $user->name = 'A Staff Member';
        $user->type = 'admin';
        $user->save();

        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(TicketTableSeeder::class);
        $this->call(CommentTableSeeder::class);

        Model::reguard();
    }
}
