<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['Md. Rahim Uddin', '01711000001', 'rahim@example.com', 'Dhanmondi, Dhaka'],
            ['Nusrat Jahan', '01811000002', 'nusrat@example.com', 'Uttara, Dhaka'],
            ['Sakib Ahmed', '01911000003', 'sakib@example.com', 'Mirpur, Dhaka'],
            ['Farzana Akter', '01611000004', 'farzana@example.com', 'Mohammadpur, Dhaka'],
            ['Tanvir Hasan', '01711000005', 'tanvir@example.com', 'Banani, Dhaka'],
            ['Sumaiya Islam', '01811000006', 'sumaiya@example.com', 'Gulshan, Dhaka'],
            ['Arif Hossain', '01911000007', 'arif@example.com', 'Bashundhara, Dhaka'],
            ['Mim Akter', '01611000008', 'mim@example.com', 'Khilgaon, Dhaka'],
            ['Imran Kabir', '01711000009', 'imran@example.com', 'Agrabad, Chattogram'],
            ['Jannatul Ferdous', '01811000010', 'jannatul@example.com', 'Panchlaish, Chattogram'],
            ['Mahmudul Hasan', '01911000011', 'mahmud@example.com', 'Halishahar, Chattogram'],
            ['Tanjina Rahman', '01611000012', 'tanjina@example.com', 'Sylhet Sadar, Sylhet'],
            ['Shakil Ahmed', '01711000013', 'shakil@example.com', 'Zindabazar, Sylhet'],
            ['Raisa Chowdhury', '01811000014', 'raisa@example.com', 'Rajshahi Sadar, Rajshahi'],
            ['Arafat Karim', '01911000015', 'arafat@example.com', 'Khulna Sadar, Khulna'],
            ['Sadia Afrin', '01611000016', 'sadia@example.com', 'Barishal Sadar, Barishal'],
            ['Rifat Hossain', '01711000017', 'rifat@example.com', 'Mymensingh Sadar, Mymensingh'],
            ['Tasnim Ahmed', '01811000018', 'tasnim@example.com', 'Cumilla Sadar, Cumilla'],
            ['Mehedi Hasan', '01911000019', 'mehedi@example.com', 'Narayanganj Sadar, Narayanganj'],
            ['Sabrina Sultana', '01611000020', 'sabrina@example.com', 'Bogra Sadar, Bogura'],
        ];

        foreach ($customers as [$name, $phone, $email, $address]) {
            Customer::updateOrCreate(
                ['email' => $email],
                compact('name', 'phone', 'address')
            );
        }
    }
}
    