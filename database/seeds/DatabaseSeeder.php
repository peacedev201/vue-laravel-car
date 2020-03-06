<?php

use App\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        AdminUser::create([
            'name' => 'admin',
            'password' => Hash::make('admin')
        ]);
    }
}
