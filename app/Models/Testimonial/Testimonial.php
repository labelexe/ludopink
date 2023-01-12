<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        "profile_image",
        "Designation",
        "username",
        "usermail",
        "Star",
        "Review",
        "submit_date",
    ];
}
