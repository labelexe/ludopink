<?php

namespace App\Models\Special;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    use HasFactory;

    protected $fillable = [
        "offer_title",
        "add_offer_coin",
        "user_received_coin",
        "offerimage",
        ];
}
