<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['url', 'meta', 'item_id', 'item_type'];

    public function item(){
        return $this->morphTo('item','item_type', 'item_id');
    }
}
