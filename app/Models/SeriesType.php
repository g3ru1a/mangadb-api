<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        return $this->belongsTo(ItemType::class);
    }

    public function staff(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
