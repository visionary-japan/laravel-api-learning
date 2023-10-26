<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\BookScope;

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

    protected static function booted(): void
    {
        static::addGlobalScope(new BookScope);
    }

    public function loans(): hasOne
    {
        return $this->hasOne('Loan');
    }

    public function reviews(): hasMany
    {
        return $this->hasMany('Review');
    }

}
