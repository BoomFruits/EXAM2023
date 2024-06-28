<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0 ; $i<20;$i++){
            Customer::create([
                'Name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber
                
            ]);
         }
    }
}
