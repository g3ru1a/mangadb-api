<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'summary', 'number', 'isbn_10', 'isbn_13',
        'page_count', 'release_date', 'series_type_id', 'publisher_id',
        'language_id', 'binding_id'];

    public function series_type(): BelongsTo
    {
        return $this->belongsTo(SeriesType::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function binding(): BelongsTo
    {
        return $this->belongsTo(Binding::class);
    }

    public function media(): MorphOne
    {
        return $this->morphOne(Media::class, 'item', 'item_type', 'item_id');
    }

    public function review(): MorphOne
    {
        return $this->morphOne(Review::class, 'item', 'item_type', 'item_id');
    }

    public static function approvedOnly(): Collection|array
    {
        return Book::whereHas('review', function($query){
            $query->where('status', 'approved');
        })->orWhereDoesntHave('review')->get();
    }
}
