<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $roomids = Room::pluck('RoomID')->toArray();
        $customerids = Customer::pluck('CustomerID')->toArray();
        for($i = 0 ; $i<20;$i++){
            Booking::create([
                'CustomerID' => $faker->randomElement($customerids),
                'RoomID' => $faker->randomElement($roomids),
                'checkin' => now(),
                'checkout' => now()
                
            ]);
         }
    }
}
