<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(string[] $array)
 */
class ItemType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];
}
