<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function loans(): hasOne
    {
        return $this->hasOne('\App\Models\loans');
    }

    public function reviews(): hasMany
    {
        return $this->hasMany('\App\Models\reviews');
    }

}
