<?php

namespace App\Models\AddCoin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addcoin extends Model
{
    use HasFactory;

    protected $fillable = [
            "playerid",
            "image",
            "name",
            "email",
            "coin",
            "status",
            "trans_date",
    ];
}
