<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_name' => '佐藤真一',
            'email' => 'sato.shinichi@example.com',
        ]);

        User::create([
            'user_name' => '中村花子',
            'email' => 'nakamura.hanako@example.com',
        ]);

        User::create([
            'user_name' => '鈴木一郎',
            'email' => 'suzuki.ichiro@example.com',
        ]);

        User::create([
            'user_name' => '山田由美',
            'email' => 'yamada.yumi@example.com',
        ]);

        User::create([
            'user_name' => '木村拓真',
            'email' => 'kimura.takuma@example.com',
        ]);
    }
}
