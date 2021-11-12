<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'firstName',
        'lastName',
        'country',
        'district',
        'province',
        'ward',
        'companyName',
        'zipCode',
        'address',
        'apartment'
    ];

    protected $table = "address";
}
