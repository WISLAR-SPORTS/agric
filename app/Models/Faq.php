<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Faq extends Model
{
    protected $fillable = [
        'name',
        'email',
        'question',
        'answer',
        'category_id',
        'sort_order',
        'is_active',
        'is_answered',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}