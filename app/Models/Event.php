<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'max_seats',
        'location',
        'event_date',
        'status',
    ];

    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
