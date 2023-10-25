<?php
namespace App\Scopes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ScopeBook extends Model
{
    /**
     * 特定の会社に紐づく社員のクエリのスコープを設定
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBookList($query, $publishedDate)
    {
        return $query->where('published_date', $publishedDate);
    }
}
