<?php

namespace App\Models\Friends;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = [
            "playerid",
            "friendsid",
            "name",
            "photo",
            "coin",
            "status",
        ];
}
