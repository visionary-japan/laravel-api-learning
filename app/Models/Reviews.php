<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    public function users(): belongsTo
    {
      return $this->belongsTo('\App\Models\users');
    }

    public function books(): belongsTo
    {
      return $this->belongsTo('\App\Models\books');
    }

}
