<?php

use Illuminate\Database\Seeder;
use App\Candidate;

class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Candidate::create([
                'name' => $faker->name(),
                'phone' => $faker->phoneNumber,
                'email'=> $faker->email,
                'position'=>  $faker->randomDigit,
                'status'=> rand(0,1),

            ]);
        }
    }
}
