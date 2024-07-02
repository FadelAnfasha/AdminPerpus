<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Author;
use App\Models\Member;
use App\Models\Bookshelf;
use App\Models\Publisher;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $dataNum = 10; // Replace this with the desired number of authors

        $authors = [];
        $publishers = [];
        $bookshelves = [];

        for ($i = 1; $i <= $dataNum; $i++) {
            $authors[] = [
                'name' => 'Author' . $i, // Use the correct concatenation operator for strings
                'status' => 'Status' . $i,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        Author::insert($authors);

        for ($i = 1; $i <= $dataNum; $i++) {
            $publishers[] = [
                'name' => 'Publisher' . $i,
                'address' => 'Address' . $i,
                'phoneNumber' => $i,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }

        Publisher::insert($publishers);

        for ($i = 1; $i <= $dataNum; $i++) {
            $bookshelves[] = [
                'code' => 'A-' . $i,
                'location' => 'Location' . $i,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        Bookshelf::insert($bookshelves);

        Member::insert([
            [
                'name' => 'Giyu',
                'gender' => 'Male',
                'address' => '123 Main St, Anytown, USA',
                'phoneNumber' => '123-456-7890',
                'photo' => 'giyu.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sanemi',
                'gender' => 'Male',
                'address' => '456 Maple Ave, Anytown, USA',
                'photo' => 'sanemi.jpg',
                'phoneNumber' => '987-654-3210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muichiro',
                'gender' => 'Male',
                'address' => '789 Elm St, Anytown, USA',
                'phoneNumber' => '555-123-4567',
                'photo' => 'muichiro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tengen',
                'gender' => 'Male',
                'address' => '101 Pine St, Anytown, USA',
                'phoneNumber' => '555-987-6543',
                'photo' => 'tengen.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Obanai',
                'gender' => 'Male',
                'address' => '101 Pine St, Anytown, USA',
                'phoneNumber' => '555-987-6543',
                'photo' => 'obanai.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
