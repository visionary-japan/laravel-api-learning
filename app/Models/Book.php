<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

use App\Models\Loan;
use App\Models\Review;

class Book extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'published_date',
        'summary',
    ];

    public function loans(): hasOne
    {
        return $this->hasOne('Loan');
    }

    public function reviews(): hasMany
    {
        return $this->hasMany('Review');
    }

}
