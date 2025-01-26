<?php

namespace Database\Factories;

use App\Models\Penulis;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenulisFactory extends Factory
{
    /**
     * Nama model yang terkait dengan factory.
     *
     * @var string
     */
    protected $model = Penulis::class;

    /**
     * Definisikan model state default.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
        ];
    }
}
