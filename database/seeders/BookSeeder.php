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
            'title' => '月の影の秘密',
            'author' => '美咲真琴',
            'isbn' => 9784577041161,
            'published_date' => '20130801',
            'summary' => '小さな村に伝わる、月に隠された秘密を巡る冒険。主人公リカは古代の呪文を発見し、月の神殿を探す旅に出る。しかし、待ち受けるのは予想外の真実と試練だった。',
        ]);

        Book::create([
            'title' => '風を追う時間',
            'author' => '高木龍一',
            'isbn' => 4739285620183,
            'published_date' => '20141023',
            'summary' => '時間を操る力を持つ青年ユウトは、過去のトラウマを修復するために時間を遡る。彼の旅を通じて、時間の流れと人生の意味についての考察が繰り広げられる',
        ]);

        Book::create([
            'title' => '砂の中のエピローグ',
            'author' => '川村恵理子',
            'isbn' => 6145820936752,
            'published_date' => '20180820',
            'summary' => '砂漠の中の遺跡で起きた一連の怪奇事件。考古学者のサナは、遺跡の秘密と自身の家族の過去が絡み合っていることを知る。歴史と現代、家族の絆がテーマの物語。',
        ]);

        Book::create([
            'title' => '星降る夜の記憶',
            'author' => '小林哲也',
            'isbn' => 7592038145621,
            'published_date' => '20200915',
            'summary' => '空から星が降る夜、少女ミオは謎の男と出会う。彼は未来から来たと言い、世界の終わりを防ぐための協力を求める。ミオの選択が未来を変えるキーとなる。',
        ]);

        Book::create([
            'title' => '未来の彼方への旅',
            'author' => '山口美穂',
            'isbn' => 8320914735620,
            'published_date' => '20190203',
            'summary' => '未来の都市を舞台に、高度なテクノロジーと自然環境の共存を模索するグループの挑戦を描く。彼らの活動を通じて、持続可能な未来の姿が提示される。',
        ]);

    }
}
