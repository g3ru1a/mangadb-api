<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReviewComment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'review_id', 'message'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class, 'review_id');
    }
}
