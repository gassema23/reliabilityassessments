<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'city_name',
        'clli',
        'latitude',
        'longitude',
        'area_id',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
