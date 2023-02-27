<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['submitter_id', 'reviewer_id', 'replace_id', 'item_id', 'item_type', 'status'];

    public function submitter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'submitter_id');
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function item(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'item_type', 'item_id');
    }

    public function replace_item(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'replace_type', 'replace_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(ReviewComment::class);
    }
}
