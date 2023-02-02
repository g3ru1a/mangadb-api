<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeriesTypeStaff extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['role', 'series_type_id', 'staff_id'];

}
