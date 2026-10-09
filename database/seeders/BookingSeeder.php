<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = Room::pluck('id', 'room_number');
        $customers = Customer::pluck('id', 'name');

        $bookings = [
            ['Md. Rahim Uddin', '103', -2, 2, 2, 'checked_in'],
            ['Nusrat Jahan', '202', -1, 3, 2, 'checked_in'],
            ['Sakib Ahmed', '302', -3, 1, 2, 'confirmed'],
            ['Farzana Akter', '403', -1, 4, 3, 'checked_in'],
            ['Tanvir Hasan', '101', 2, 5, 1, 'confirmed'],
            ['Sumaiya Islam', '102', 3, 6, 1, 'pending'],
            ['Arif Hossain', '104', 5, 8, 2, 'confirmed'],
            ['Mim Akter', '105', 1, 4, 2, 'confirmed'],
            ['Imran Kabir', '201', 4, 7, 1, 'pending'],
            ['Jannatul Ferdous', '203', 2, 5, 2, 'confirmed'],
            ['Mahmudul Hasan', '204', 7, 10, 4, 'pending'],
            ['Tanjina Rahman', '205', 6, 9, 4, 'confirmed'],
            ['Shakil Ahmed', '301', -5, -2, 1, 'checked_out'],
            ['Raisa Chowdhury', '303', -8, -5, 2, 'checked_out'],
            ['Arafat Karim', '305', -6, -3, 4, 'checked_out'],
            ['Sadia Afrin', '401', -10, -7, 2, 'checked_out'],
            ['Rifat Hossain', '402', 8, 11, 2, 'pending'],
            ['Tasnim Ahmed', '404', 10, 13, 3, 'confirmed'],
            ['Mehedi Hasan', '105', 14, 17, 2, 'pending'],
            ['Sabrina Sultana', '203', 12, 15, 2, 'confirmed'],
            ['Md. Rahim Uddin', '104', -15, -12, 2, 'checked_out'],
            ['Nusrat Jahan', '205', -20, -17, 3, 'checked_out'],
            ['Sakib Ahmed', '303', -18, -15, 2, 'checked_out'],
            ['Farzana Akter', '401', 16, 19, 2, 'confirmed'],
            ['Tanvir Hasan', '102', 20, 23, 1, 'pending'],
            ['Sumaiya Islam', '204', 18, 22, 4, 'confirmed'],
            ['Arif Hossain', '305', 22, 25, 4, 'pending'],
            ['Mim Akter', '404', 25, 28, 2, 'confirmed'],
            ['Imran Kabir', '101', -25, -22, 1, 'cancelled'],
            ['Jannatul Ferdous', '201', -30, -27, 1, 'cancelled'],
        ];

        foreach ($bookings as [$customer, $room, $in, $out, $guests, $status]) {
            $checkIn = Carbon::today()->addDays($in);
            $checkOut = Carbon::today()->addDays($out);
            $roomId = $rooms[$room];
            $roomData = Room::findOrFail($roomId);

            Booking::create([
                'customer_id' => $customers[$customer],
                'room_id' => $roomId,
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'guests' => $guests,
                'total_amount' => $checkIn->diffInDays($checkOut)
                    * $roomData->price_per_night,
                'status' => $status,
            ]);
        }
    }
}
