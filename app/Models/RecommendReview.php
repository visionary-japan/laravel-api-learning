<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Book;

class RecommendReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rating',
        'comment',
    ];

    public function users(): belongsTo
    {
        return $this->belongsTo('User');
    }

    public function books(): belongsTo
    {
        return $this->belongsTo('Book');
    }

}
