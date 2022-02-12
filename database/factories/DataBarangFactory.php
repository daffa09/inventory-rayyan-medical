<?php

namespace Database\Factories;

use App\Models\Databarang;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataBarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Databarang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenisBarang_id' => mt_rand(1, 3),
            'user_id' => mt_rand(2, 3),
            'distributor_id' => mt_rand(2, 10),
            'qty' => mt_rand(1, 100),
            'tgl_masuk' => now()->format('Y-m-d'),
            'tgl_keluar' => now()->format('Y-m-d')
        ];
    }
}
