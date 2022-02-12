<?php

namespace Database\Factories;

use App\Models\PesanBarang;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesanBarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PesanBarang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'vendor' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'no_telp' => $this->faker->unique()->phoneNumber()
        ];
    }
}
