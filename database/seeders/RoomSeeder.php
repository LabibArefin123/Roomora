<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            ['101', 'Single', 1, 1, 2500, 'available'],
            ['102', 'Single', 1, 1, 2700, 'available'],
            ['103', 'Double', 1, 2, 3800, 'occupied'],
            ['104', 'Double', 1, 2, 4200, 'available'],
            ['105', 'Deluxe', 1, 2, 5500, 'available'],
            ['201', 'Single', 2, 1, 2600, 'available'],
            ['202', 'Double', 2, 2, 4000, 'occupied'],
            ['203', 'Deluxe', 2, 2, 5800, 'available'],
            ['204', 'Family', 2, 4, 7000, 'available'],
            ['205', 'Suite', 2, 4, 9500, 'available'],
            ['301', 'Single', 3, 1, 2800, 'available'],
            ['302', 'Double', 3, 2, 4300, 'occupied'],
            ['303', 'Deluxe', 3, 2, 6000, 'available'],
            ['304', 'Family', 3, 4, 7500, 'maintenance'],
            ['305', 'Suite', 3, 4, 10000, 'available'],
            ['401', 'Double', 4, 2, 4500, 'available'],
            ['402', 'Deluxe', 4, 2, 6200, 'available'],
            ['403', 'Family', 4, 4, 7800, 'occupied'],
            ['404', 'Suite', 4, 4, 10500, 'available'],
            ['405', 'Presidential Suite', 4, 5, 15000, 'inactive'],
        ];

        foreach ($rooms as [$number, $type, $floor, $capacity, $price, $status]) {
            Room::updateOrCreate(
                ['room_number' => $number],
                [
                    'room_type' => $type,
                    'floor' => $floor,
                    'capacity' => $capacity,
                    'price_per_night' => $price,
                    'status' => $status,
                    'description' => "$type room on floor $floor.",
                ]
            );
        }
    }
}
