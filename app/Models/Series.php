<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Series extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['summary'];

    public function cover(): MorphOne
    {
        return $this->morphOne(Media::class, 'item', 'item_type', 'item_id');
    }

    public function names(): HasMany
    {
        return $this->hasMany(SeriesName::class);
    }

    public function types(): HasMany
    {
        return $this->hasMany(SeriesType::class);
    }
}
