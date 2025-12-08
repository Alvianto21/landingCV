<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'username' => 'testeruser',
            'password' => Hash::make('1Asdqwe2'),
            'gender' => 'male',
            'place_of_birth' => 'Jakarta',
            'date_of_birth' => '1990-01-01',
            'role' => 'admin',
            'profile_picture' => fake()->imageUrl(200, 200, 'people'),
            'bio' => fake()->sentence(12),
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),
            'work_experiences' => json_encode([
                0 => [
                    'company' => fake()->company(),
                    'position' => fake()->jobTitle(),
                    'start_date' => fake()->date(),
                    'end_date' => fake()->date(),
                    'description' => fake()->paragraph()
                ]
            ]),
            'educations' => json_encode([
                0 => [
                    'institution' => fake()->company(),
                    'degree' => 'Bachelor of ' . fake()->word(),
                    'start_date' => fake()->date(),
                    'end_date' => fake()->date(),
                    'link' => fake()->url()
                ],
            ]),
            'skills' => implode(', ', fake()->words(5)),
            'social_links' => json_encode([
                0 => [
                    'platform' => 'linkedin',
                    'link' => fake()->url()
                ],
                1 => [
                    'platform' => 'github',
                    'link' => fake()->url()
                ],
                2 => [
                    'platform' => 'x',
                    'link' => fake()->url()
                ]
            ])
        ]);
    }
}
