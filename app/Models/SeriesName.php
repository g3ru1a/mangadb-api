<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeriesName extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'language_id', 'series_id'];

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
