<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'area_name',
        'area_shortname',
        'state_id',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

}
