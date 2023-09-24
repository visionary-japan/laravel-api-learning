<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'book_id' => 1,
            'user_id' => 2,
            'rating' => 4,
            'comment' => '主人公の成長と共に読者も自分自身を振り返ることができる心温まる作品でした。',
        ]);

        Review::create([
            'book_id' => 2,
            'user_id' => 4,
            'rating' => 3,
            'comment' => '登場人物たちの心情が詳細に描かれており、読み手は時間を超えた絆の美しさに引き込まれるでしょう。',
        ]);

        Review::create([
            'book_id' => 3,
            'user_id' => 3,
            'rating' => 5,
            'comment' => 'この作品は、人々が自分自身の夢や望みを追い求める過程を美しく描写しています。',
        ]);

        Review::create([
            'book_id' => 4,
            'user_id' => 5,
            'rating' => 5,
            'comment' => '二人の主人公の恋の行方と、宇宙の壮大さが絶妙にマッチしています。',
        ]);

        Review::create([
            'book_id' => 5,
            'user_id' => 1,
            'rating' => 3,
            'comment' => '未知の世界への興奮と、新しい発見の喜びを読者にしっかりと伝えています。',
        ]);

    }
}
