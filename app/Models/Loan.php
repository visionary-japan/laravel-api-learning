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

    public function users(): belongsTo
    {
        return $this->belongsTo('User');
    }

    public function books(): hasOne
    {
        return $this->hasOne('Book');
    }

}
