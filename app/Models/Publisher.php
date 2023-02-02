<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'url', 'about'];

    public function logo(){
        return $this->morphOne(Media::class, 'item', 'item_type', 'item_id');
    }
}
