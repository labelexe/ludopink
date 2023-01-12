<?php

namespace App\Models\Gamehistory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamehistorie extends Model
{
    use HasFactory;

    protected $fillable = [
        "playerid",
        "status",
        "bid_amount",
        "Win_amount",
        "loss_amount",
        "seat_limit",
        "oppo1",
        "oppo2",
        "oppo3",
        "playername",
        "finalamount",
        "playtime",
];

}
