<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Loan;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Loan::create([
            'book_id' => 1,
            'user_id' => 2,
            'loan_date' => '20230410',
            'return_date' => '20230415',
            'due_date' => '20230510',
        ]);

        Loan::create([
            'book_id' => 2,
            'user_id' => 4,
            'loan_date' => '20230522',
            'return_date' => '20230530',
            'due_date' => '20230622',
        ]);

        Loan::create([
            'book_id' => 4,
            'user_id' => 1,
            'loan_date' => '20230703',
            'return_date' => '20230713',
            'due_date' => '20230803',
        ]);

        Loan::create([
            'book_id' => 5,
            'user_id' => 3,
            'loan_date' => '20230720',
            'return_date' => '20230728',
            'due_date' => '20230820',
        ]);

        Loan::create([
            'book_id' => 3,
            'user_id' => 5,
            'loan_date' => '20230117',
            'return_date' => '20230121',
            'due_date' => '20230217',
        ]);
    }
}
