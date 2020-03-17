<?php

use App\User;
use Illuminate\Database\Seeder;

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
        User::create([
            'cpf' => '1234567444-00',
            'name' => 'João Mangueira',
            'email' => 'joao@joao.com',
            'password' => env("PASSWORD_HASH") ? bcrypt('123456') : '123456'
        ]);
    }
}
