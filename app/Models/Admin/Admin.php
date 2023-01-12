<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
            "name",
            "username",
            "email",
            "role",
            "password",
            "bio",
            "birthdate",
            "website",
            "phone",
            "country",
            "company",
            "profile_img",
            "work",
            "publish_year",
            "facebook",
            "instagram",
            "twitter",
            "linkedin",
            "youtube",
            "whatsapp",
    ];
}
