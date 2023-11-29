<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'range_from', 'range_to', 'quantity', 'discount_percentage', 'status'];
}
