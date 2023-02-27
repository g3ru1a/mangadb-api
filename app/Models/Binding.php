<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(string[] $array)
 */
class Binding extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function review(): MorphOne
    {
        return $this->morphOne(Review::class, 'item', 'item_type', 'item_id');
    }

    public static function approvedOnly(): Collection|array
    {
        return Binding::whereHas('review', function($query){
            $query->where('status', 'approved');
        })->orWhereDoesntHave('review')->get();
    }
}
