<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Book;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rating',
        'comment',
        'book_id',
    ];

    public function users(): belongsTo
    {
        return $this->belongsTo('User');
    }

    public function books(): belongsTo
    {
        return $this->belongsTo('Book');
    }

    protected static function booted()
    {
        static::created(function (Review $reviews) {
            if( $reviews->rating == 5){
                $recommend_reviews = new RecommendReview();
                $recommend_reviews->book_id = $reviews->book_id;
                $recommend_reviews->rating = $reviews->rating;
                $recommend_reviews->comment = $reviews->comment;
                $recommend_reviews->save();
                throw new \Exception('エラーが出たよ');
            }
        });
    }

}
