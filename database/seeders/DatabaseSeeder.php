<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            [
                'room_number' => '101',
                'room_type' => 'Single',
                'floor' => 1,
                'capacity' => 1,
                'price_per_night' => 2500,
                'status' => 'available',
                'description' => 'Comfortable single room with a peaceful city view.',
            ],
            [
                'room_number' => '102',
                'room_type' => 'Single',
                'floor' => 1,
                'capacity' => 1,
                'price_per_night' => 2700,
                'status' => 'available',
                'description' => 'Modern single room with complimentary Wi-Fi.',
            ],
            [
                'room_number' => '103',
                'room_type' => 'Double',
                'floor' => 1,
                'capacity' => 2,
                'price_per_night' => 3800,
                'status' => 'occupied',
                'description' => 'Spacious double room suitable for couples.',
            ],
            [
                'room_number' => '104',
                'room_type' => 'Double',
                'floor' => 1,
                'capacity' => 2,
                'price_per_night' => 4200,
                'status' => 'available',
                'description' => 'Premium double room with a comfortable sitting area.',
            ],
            [
                'room_number' => '105',
                'room_type' => 'Deluxe',
                'floor' => 1,
                'capacity' => 2,
                'price_per_night' => 5500,
                'status' => 'available',
                'description' => 'Deluxe room with premium furniture and city view.',
            ],

            [
                'room_number' => '201',
                'room_type' => 'Single',
                'floor' => 2,
                'capacity' => 1,
                'price_per_night' => 2600,
                'status' => 'available',
                'description' => 'Bright single room ideal for business travellers.',
            ],
            [
                'room_number' => '202',
                'room_type' => 'Double',
                'floor' => 2,
                'capacity' => 2,
                'price_per_night' => 4000,
                'status' => 'occupied',
                'description' => 'Comfortable double room with modern amenities.',
            ],
            [
                'room_number' => '203',
                'room_type' => 'Deluxe',
                'floor' => 2,
                'capacity' => 2,
                'price_per_night' => 5800,
                'status' => 'available',
                'description' => 'Elegant deluxe room with premium bedding.',
            ],
            [
                'room_number' => '204',
                'room_type' => 'Family',
                'floor' => 2,
                'capacity' => 4,
                'price_per_night' => 7000,
                'status' => 'available',
                'description' => 'Large family room with four guest capacity.',
            ],
            [
                'room_number' => '205',
                'room_type' => 'Suite',
                'floor' => 2,
                'capacity' => 4,
                'price_per_night' => 9500,
                'status' => 'available',
                'description' => 'Premium suite with separate living and sleeping areas.',
            ],

            [
                'room_number' => '301',
                'room_type' => 'Single',
                'floor' => 3,
                'capacity' => 1,
                'price_per_night' => 2800,
                'status' => 'available',
                'description' => 'Quiet single room with excellent natural lighting.',
            ],
            [
                'room_number' => '302',
                'room_type' => 'Double',
                'floor' => 3,
                'capacity' => 2,
                'price_per_night' => 4300,
                'status' => 'occupied',
                'description' => 'Modern double room with city-facing windows.',
            ],
            [
                'room_number' => '303',
                'room_type' => 'Deluxe',
                'floor' => 3,
                'capacity' => 2,
                'price_per_night' => 6000,
                'status' => 'available',
                'description' => 'Spacious deluxe accommodation for a relaxing stay.',
            ],
            [
                'room_number' => '304',
                'room_type' => 'Family',
                'floor' => 3,
                'capacity' => 4,
                'price_per_night' => 7500,
                'status' => 'maintenance',
                'description' => 'Family room currently unavailable for maintenance.',
            ],
            [
                'room_number' => '305',
                'room_type' => 'Suite',
                'floor' => 3,
                'capacity' => 4,
                'price_per_night' => 10000,
                'status' => 'available',
                'description' => 'Luxury suite designed for families and longer stays.',
            ],

            [
                'room_number' => '401',
                'room_type' => 'Double',
                'floor' => 4,
                'capacity' => 2,
                'price_per_night' => 4500,
                'status' => 'available',
                'description' => 'Comfortable double room with modern facilities.',
            ],
            [
                'room_number' => '402',
                'room_type' => 'Deluxe',
                'floor' => 4,
                'capacity' => 2,
                'price_per_night' => 6200,
                'status' => 'available',
                'description' => 'Premium deluxe room with a relaxing atmosphere.',
            ],
            [
                'room_number' => '403',
                'room_type' => 'Family',
                'floor' => 4,
                'capacity' => 4,
                'price_per_night' => 7800,
                'status' => 'occupied',
                'description' => 'Spacious family room for up to four guests.',
            ],
            [
                'room_number' => '404',
                'room_type' => 'Suite',
                'floor' => 4,
                'capacity' => 4,
                'price_per_night' => 10500,
                'status' => 'available',
                'description' => 'Luxury suite with premium furnishings.',
            ],
            [
                'room_number' => '405',
                'room_type' => 'Presidential Suite',
                'floor' => 4,
                'capacity' => 5,
                'price_per_night' => 15000,
                'status' => 'inactive',
                'description' => 'Exclusive presidential suite currently inactive.',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }

        $customers = [
            ['name' => 'Md. Rahim Uddin', 'phone' => '01711000001', 'email' => 'rahim@example.com', 'address' => 'Dhanmondi, Dhaka'],
            ['name' => 'Nusrat Jahan', 'phone' => '01811000002', 'email' => 'nusrat@example.com', 'address' => 'Uttara, Dhaka'],
            ['name' => 'Sakib Ahmed', 'phone' => '01911000003', 'email' => 'sakib@example.com', 'address' => 'Mirpur, Dhaka'],
            ['name' => 'Farzana Akter', 'phone' => '01611000004', 'email' => 'farzana@example.com', 'address' => 'Mohammadpur, Dhaka'],
            ['name' => 'Tanvir Hasan', 'phone' => '01711000005', 'email' => 'tanvir@example.com', 'address' => 'Banani, Dhaka'],
            ['name' => 'Sumaiya Islam', 'phone' => '01811000006', 'email' => 'sumaiya@example.com', 'address' => 'Gulshan, Dhaka'],
            ['name' => 'Arif Hossain', 'phone' => '01911000007', 'email' => 'arif@example.com', 'address' => 'Bashundhara, Dhaka'],
            ['name' => 'Mim Akter', 'phone' => '01611000008', 'email' => 'mim@example.com', 'address' => 'Khilgaon, Dhaka'],
            ['name' => 'Imran Kabir', 'phone' => '01711000009', 'email' => 'imran@example.com', 'address' => 'Agrabad, Chattogram'],
            ['name' => 'Jannatul Ferdous', 'phone' => '01811000010', 'email' => 'jannatul@example.com', 'address' => 'Panchlaish, Chattogram'],
            ['name' => 'Mahmudul Hasan', 'phone' => '01911000011', 'email' => 'mahmud@example.com', 'address' => 'Halishahar, Chattogram'],
            ['name' => 'Tanjina Rahman', 'phone' => '01611000012', 'email' => 'tanjina@example.com', 'address' => 'Sylhet Sadar, Sylhet'],
            ['name' => 'Shakil Ahmed', 'phone' => '01711000013', 'email' => 'shakil@example.com', 'address' => 'Zindabazar, Sylhet'],
            ['name' => 'Raisa Chowdhury', 'phone' => '01811000014', 'email' => 'raisa@example.com', 'address' => 'Rajshahi Sadar, Rajshahi'],
            ['name' => 'Arafat Karim', 'phone' => '01911000015', 'email' => 'arafat@example.com', 'address' => 'Khulna Sadar, Khulna'],
            ['name' => 'Sadia Afrin', 'phone' => '01611000016', 'email' => 'sadia@example.com', 'address' => 'Barishal Sadar, Barishal'],
            ['name' => 'Rifat Hossain', 'phone' => '01711000017', 'email' => 'rifat@example.com', 'address' => 'Mymensingh Sadar, Mymensingh'],
            ['name' => 'Tasnim Ahmed', 'phone' => '01811000018', 'email' => 'tasnim@example.com', 'address' => 'Cumilla Sadar, Cumilla'],
            ['name' => 'Mehedi Hasan', 'phone' => '01911000019', 'email' => 'mehedi@example.com', 'address' => 'Narayanganj Sadar, Narayanganj'],
            ['name' => 'Sabrina Sultana', 'phone' => '01611000020', 'email' => 'sabrina@example.com', 'address' => 'Bogra Sadar, Bogura'],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }

        $roomsByNumber = Room::pluck('id', 'room_number');
        $customersByName = Customer::pluck('id', 'name');

        $bookings = [
            ['customer' => 'Md. Rahim Uddin', 'room' => '103', 'in' => '-2 days', 'out' => '+2 days', 'guests' => 2, 'status' => 'checked_in'],
            ['customer' => 'Nusrat Jahan', 'room' => '202', 'in' => '-1 day', 'out' => '+3 days', 'guests' => 2, 'status' => 'checked_in'],
            ['customer' => 'Sakib Ahmed', 'room' => '302', 'in' => '-3 days', 'out' => '+1 day', 'guests' => 2, 'status' => 'confirmed'],
            ['customer' => 'Farzana Akter', 'room' => '403', 'in' => '-1 day', 'out' => '+4 days', 'guests' => 3, 'status' => 'checked_in'],

            ['customer' => 'Tanvir Hasan', 'room' => '101', 'in' => '+2 days', 'out' => '+5 days', 'guests' => 1, 'status' => 'confirmed'],
            ['customer' => 'Sumaiya Islam', 'room' => '102', 'in' => '+3 days', 'out' => '+6 days', 'guests' => 1, 'status' => 'pending'],
            ['customer' => 'Arif Hossain', 'room' => '104', 'in' => '+5 days', 'out' => '+8 days', 'guests' => 2, 'status' => 'confirmed'],
            ['customer' => 'Mim Akter', 'room' => '105', 'in' => '+1 day', 'out' => '+4 days', 'guests' => 2, 'status' => 'confirmed'],

            ['customer' => 'Imran Kabir', 'room' => '201', 'in' => '+4 days', 'out' => '+7 days', 'guests' => 1, 'status' => 'pending'],
            ['customer' => 'Jannatul Ferdous', 'room' => '203', 'in' => '+2 days', 'out' => '+5 days', 'guests' => 2, 'status' => 'confirmed'],
            ['customer' => 'Mahmudul Hasan', 'room' => '204', 'in' => '+7 days', 'out' => '+10 days', 'guests' => 4, 'status' => 'pending'],
            ['customer' => 'Tanjina Rahman', 'room' => '205', 'in' => '+6 days', 'out' => '+9 days', 'guests' => 4, 'status' => 'confirmed'],

            ['customer' => 'Shakil Ahmed', 'room' => '301', 'in' => '-5 days', 'out' => '-2 days', 'guests' => 1, 'status' => 'checked_out'],
            ['customer' => 'Raisa Chowdhury', 'room' => '303', 'in' => '-8 days', 'out' => '-5 days', 'guests' => 2, 'status' => 'checked_out'],
            ['customer' => 'Arafat Karim', 'room' => '305', 'in' => '-6 days', 'out' => '-3 days', 'guests' => 4, 'status' => 'checked_out'],
            ['customer' => 'Sadia Afrin', 'room' => '401', 'in' => '-10 days', 'out' => '-7 days', 'guests' => 2, 'status' => 'checked_out'],

            ['customer' => 'Rifat Hossain', 'room' => '402', 'in' => '+8 days', 'out' => '+11 days', 'guests' => 2, 'status' => 'pending'],
            ['customer' => 'Tasnim Ahmed', 'room' => '404', 'in' => '+10 days', 'out' => '+13 days', 'guests' => 3, 'status' => 'confirmed'],
            ['customer' => 'Mehedi Hasan', 'room' => '105', 'in' => '+14 days', 'out' => '+17 days', 'guests' => 2, 'status' => 'pending'],
            ['customer' => 'Sabrina Sultana', 'room' => '203', 'in' => '+12 days', 'out' => '+15 days', 'guests' => 2, 'status' => 'confirmed'],

            ['customer' => 'Md. Rahim Uddin', 'room' => '104', 'in' => '-15 days', 'out' => '-12 days', 'guests' => 2, 'status' => 'checked_out'],
            ['customer' => 'Nusrat Jahan', 'room' => '205', 'in' => '-20 days', 'out' => '-17 days', 'guests' => 3, 'status' => 'checked_out'],
            ['customer' => 'Sakib Ahmed', 'room' => '303', 'in' => '-18 days', 'out' => '-15 days', 'guests' => 2, 'status' => 'checked_out'],
            ['customer' => 'Farzana Akter', 'room' => '401', 'in' => '+16 days', 'out' => '+19 days', 'guests' => 2, 'status' => 'confirmed'],

            ['customer' => 'Tanvir Hasan', 'room' => '102', 'in' => '+20 days', 'out' => '+23 days', 'guests' => 1, 'status' => 'pending'],
            ['customer' => 'Sumaiya Islam', 'room' => '204', 'in' => '+18 days', 'out' => '+22 days', 'guests' => 4, 'status' => 'confirmed'],
            ['customer' => 'Arif Hossain', 'room' => '305', 'in' => '+22 days', 'out' => '+25 days', 'guests' => 4, 'status' => 'pending'],
            ['customer' => 'Mim Akter', 'room' => '404', 'in' => '+25 days', 'out' => '+28 days', 'guests' => 2, 'status' => 'confirmed'],

            ['customer' => 'Imran Kabir', 'room' => '101', 'in' => '-25 days', 'out' => '-22 days', 'guests' => 1, 'status' => 'cancelled'],
            ['customer' => 'Jannatul Ferdous', 'room' => '201', 'in' => '-30 days', 'out' => '-27 days', 'guests' => 1, 'status' => 'cancelled'],
        ];

        foreach ($bookings as $booking) {
            $checkIn = Carbon::parse($booking['in']);
            $checkOut = Carbon::parse($booking['out']);
            $room = Room::find($roomsByNumber[$booking['room']]);

            Booking::create([
                'customer_id' => $customersByName[$booking['customer']],
                'room_id' => $room->id,
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'guests' => $booking['guests'],
                'total_amount' => $checkIn->diffInDays($checkOut) * $room->price_per_night,
                'status' => $booking['status'],
            ]);
        }
    }
}
