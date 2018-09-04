<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create( [
            'email' => 'admin@admin.com' ,
            'password' => Hash::make( 'password' ) ,
            'name' => 'Admin' ,
        ]);
    }
}
