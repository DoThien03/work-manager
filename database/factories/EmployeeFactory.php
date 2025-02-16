<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'emp_code' => $this->faker->unique()->randomNumber(5),
            'emp_name' => $this->faker->name,
            'emp_email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->unique()->password,
            'emp_dob' => $this->faker->date(),
            'emp_position' => $this->faker->jobTitle,
            'emp_level' => $this->faker->randomElement(['junior', 'middle', 'senior']),
            'emp_join_date' => $this->faker->date(),
            'emp_status' => $this->faker->randomElement(['active', 'inactive']),
            'emp_annual_leave_days' => $this->faker->randomNumber(2),
            'emp_remaining_leave_days' => $this->faker->randomNumber(2),
            'dept_id' => Department::factory()->create()->id,

        ];
    }
}
