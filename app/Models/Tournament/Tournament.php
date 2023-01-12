<?php

namespace App\Models\Tournament;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "bit_amount",
        "no_of_player",
        "two_player_winning",
        "no_of_winner",
        "four_player_winning_1",
        "four_player_winning_2",
        "four_player_winning_3",
        "tournament_interval",
        ];
}
