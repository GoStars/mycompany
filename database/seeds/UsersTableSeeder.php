<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 30)->create();

        DB::table('users')->insert([
            'name' => 'Andrii',
            'email' => 'test@gmail.com',
            'role' => 'director',
            'company' => 'My Company',
            'activity' => 'Director',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
