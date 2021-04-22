<?php

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserSeeder
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'name' => 'Julieth Castro',
            'email' => 'admin@demo.com',
            'password' => bcrypt('123'),
        ]);

    }
}
