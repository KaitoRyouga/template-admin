<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'input',
        'phone',
        'note'
    ];

    protected $table = "transactions";

    public static function total() {
        $data = Transactions::all();
        $total = 0;
        foreach ($data as $key => $value) {
            $total += $value->input;
        }
        return $total;
    }
}
