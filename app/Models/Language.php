<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(string[] $array)
 */
class Language extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'iso_639_1'];

    public function series_names(): HasMany
    {
        return $this->hasMany(SeriesName::class);
    }
}
