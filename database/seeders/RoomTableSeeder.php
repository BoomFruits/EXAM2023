<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0 ; $i<30;$i++){
            Room::create([
                'RoomNumber' => $i+101,
                'RoomType' => $faker->randomElement(['standard','deluxe','suite']),
                'Availability' => $faker->randomElement(['availble','occupied','under maintenance']),
            ]);
         }
    }
}
