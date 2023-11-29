<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
     protected $fillable = [
        'location1',
        'location2',
        'location3',
        'location4',
        'location5',
        'location_next1',
        'location_next2',
        'location_next3',
        'location_next4',
        'location_next5',
        'product_id',
    ];
}
