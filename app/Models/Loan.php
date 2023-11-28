<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Book;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'loan_date',
        'return_date',
        'due_date',
    ];

    /**
     * 有効期限を取得
     *
     * @param  string
     * @return string
     */
    public function getLimitAttribute()
    {
        return "{$this->loan_date} - {$this->return_date}";
    }

    public function users(): belongsTo
    {
        return $this->belongsTo('User');
    }

    public function books(): hasOne
    {
        return $this->hasOne('Book');
    }

}
