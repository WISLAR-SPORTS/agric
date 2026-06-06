<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Farmer extends Model
{
    protected $fillable = [
        'farmer_number',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'phone',
        'email',
        'national_id',
        'district',
        'sub_county',
        'village',
        'farm_size',
        'farm_size_unit',
    ];

    protected static function booted()
    {
        static::creating(function ($farmer) {
            $farmer->farmer_number =
                'FRM-' . strtoupper(Str::random(6));
        });
    }
}