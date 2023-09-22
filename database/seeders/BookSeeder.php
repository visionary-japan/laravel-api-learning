<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'アンパンマン大図鑑',
            'author' => 'やなせたかし',
            'isbn' => 9784577041161,
            'published_date' => '20130801',
            'summary' => 'アンパンマンに登場する2200以上のキャラクター全員紹介',
        ]);
    }
}
