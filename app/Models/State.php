<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'state_name',
        'state_shortname',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
