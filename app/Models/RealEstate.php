<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    use HasFactory;
        protected $fillable = [
        'name',
        'real_state_type',
        'street',
        'external_number',
        'internal_number',
        'neighborhood',
        'city',
        'country',
        'rooms',
        'bathrooms',
        'comments'

    ];
}
