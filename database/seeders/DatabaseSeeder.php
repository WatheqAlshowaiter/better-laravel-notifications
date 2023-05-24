<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $email = 'user@user.com';

        if (User::where('email', $email)->exists()) {
            $email = (\Faker\Factory::create())->unique()->safeEmail();
        }

        $user = User::factory()->create(['email' => $email]);

        Comment::factory(3)->create(['user_id' => $user->id]);

        // $this->call(
        //     Comment::factory(3)->create()
        // );

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
