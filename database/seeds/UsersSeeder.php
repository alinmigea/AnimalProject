<?php

use Illuminate\Database\Seeder;
use AnimalProject\Modules\User\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'alin',
            'email' => 'alin@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        $user->assignRole('admin');

        factory(User::class, 10)->create()->each(function ($user){
            $user->assignRole('owner');
        });
    }
}