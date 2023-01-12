<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomdata extends Model
{
    use HasFactory;

    protected $fillable = [
          "roomID",
          "title",
          "creator",
          "username",
          "seat_limit",
          "status",
          "game_mode",
          "stake_money",
          "win_money",
    ];

}
