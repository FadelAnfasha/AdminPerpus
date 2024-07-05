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
    }
}
