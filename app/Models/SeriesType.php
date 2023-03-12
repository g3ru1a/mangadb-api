<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeriesType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['series_id', 'item_type_id', 'status_id'];

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ItemType::class, 'item_type_id');
    }

    public function staff(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class)
            ->withPivot(['role'])
            ->withTimestamps();
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function review(): MorphOne
    {
        return $this->morphOne(Review::class, 'item', 'item_type', 'item_id');
    }

    public static function approvedOnly(): Collection|array
    {
        return SeriesType::whereHas('review', function($query){
            $query->where('status', 'approved');
        })->orWhereDoesntHave('review')->get();
    }
}
