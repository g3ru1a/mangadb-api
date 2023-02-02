<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'native_name', 'about', 'age', 'gender', 'origin', 'started_on', 'stopped_on'];

    public function picture(): MorphOne
    {
        return $this->morphOne(Media::class, 'item', 'item_type', 'item_id');
    }

    public function series_types(): BelongsToMany
    {
        return $this->belongsToMany(SeriesType::class);
    }
}
