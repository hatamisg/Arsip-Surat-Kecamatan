<?php

namespace Database\Factories;

use App\Models\Suma;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class SumaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Suma::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $bonco = rand(1,100);
        $a = "LR {$bonco}";
        
        return [
            'pengirim'=>$this->faker->name,
            'no'=> $a,
            'ringkasan' => $this->faker->sentence(3),
            'tujuan' => "pak camat",
            'ket' =>  $this->faker->sentence(2),
            'fsuma' => "surat1",


        ];
    }
}



