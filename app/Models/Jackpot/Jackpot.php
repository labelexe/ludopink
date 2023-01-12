<?php

namespace App\Models\Jackpot;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jackpot extends Model
{
    use HasFactory;
    protected $fillable = [
        "jackpot_entry",
        "number_of_game",
        ];
}
