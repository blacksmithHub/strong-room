<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Contact;
use App\Models\Login;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()
            ->has(Login::factory())
            ->create();

        $users = User::factory()
            ->has(Login::factory())
            ->count(50)
            ->create();

        $users->each(function ($data) use ($user) {
            Contact::factory()
                ->create([
                    'user_id' => $user->id,
                    'login_id' => $data->login->id
                ]);
        });
    }
}
