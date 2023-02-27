<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(string[] $array)
 */
class Language extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'iso_639_1'];

    public static function approvedOnly(): Collection|array
    {
        return Language::whereDoesntHave('review')
            ->orWhereHas('review', function ($query){
                $query->where('status', 'approved');
            })->get();
    }

    public function review(): MorphOne
    {
        return $this->morphOne(Review::class, 'item', 'item_type', 'item_id');
    }

    public function series_names(): HasMany
    {
        return $this->hasMany(SeriesName::class);
    }
}
