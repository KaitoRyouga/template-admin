<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tokens extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jwt',
        'key',
        'expired'
    ];

    protected $table = "tokens";
}
