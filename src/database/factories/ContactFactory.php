<?php

namespace Database\Factories;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->safeEmail(),
            'tel' => $this->faker->numberBetween(00000000000,99999999999),
            'address' =>$this->faker->prefecture . $this->faker->city . $this->faker->streetName .
            $this->faker->randomElement(['1','2','3','4','5']) . '丁目' . '-' . $this->faker->numberBetween(1,20) . '-' . $this->faker->numberBetween(1,10),
            'building' => $this->faker->optional(0.3)->randomElement(['マンション','アパート','タワー']),
            'detail'=>$this->faker->sentence(),
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}