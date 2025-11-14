<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'username' => fake()->unique()->userName(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'profile_picture' => fake()->imageUrl(200, 200, 'people'),
            'bio' => fake()->paragraph(4),
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),
            'work_experiences' => json_encode([
                0 => [
                    'company' => fake()->company(),
                    'position' => fake()->jobTitle(),
                    'start_date' => fake()->date(),
                    'end_date' => fake()->date(),
                    'description' => fake()->paragraph()
                ],
                1 => [
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
                1 => [
                    'institution' => fake()->company(),
                    'degree' => 'Master of ' . fake()->word(),
                    'start_date' => fake()->date(),
                    'end_date' => fake()->date(),
                    'link' => fake()->url()
                ]
            ]),
            'skills' => implode(', ', fake()->words(5)),
            'sosial_links' => json_encode([
                0 => [
                    'platform' => 'linkedin',
                    'url' => fake()->url()
                ],
                1 => [
                    'platform' => 'github',
                    'url' => fake()->url()
                ],
                2 => [
                    'platform' => 'x',
                    'url' => fake()->url()
                ]
            ]),
            'gender' => fake()->randomElement(['male', 'female']),
            'place_of_birth' => fake()->city(),
            'date_of_birth' => fake()->date()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
