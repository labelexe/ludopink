<?php

namespace App\Models\WebSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websetting extends Model
{
    use HasFactory;

    protected $fillable = [
            "website_name",
            "website_url",
            "website_tagline",
            "website_keyword",
            "website_desc",
            "copyright",
            "skin_mode",
            "sideskin_mode",
            "head_logo",
            "footer_logo",
            "favicon",
            "facebook",
            "youtube",
            "twitter",
            "whatsapp",
            "linkedin",
            "pinterest",
            "instagram",
            "github",
            "pnum",
            "secnum",
            "pemail",
            "secemail",
            "address",
            "about_title",
            "about_slug",
            "about_desc",
            "classic_rule",
            "quick_rule",
            "arrow_rule",
            "commission",
            "signup_bonus",
            "refer_bonus",
            "min_withdraw",
            "support_mail",
            "whatsapp_link",
            "youtube_link",
            "bot_status",
            "server_key",
            "purchase_link",
            "payment_apikey",
            "payment_secret",
            "terms_title",
            "terms_slug",
            "terms_desc",
            "privacy_title",
            "privacy_slug",
            "privacy_desc",
            "whatsapp_link",
            "youtube_link",
            "purchase_link",
            "activeplayer",
            "app_version",
            "telegram_link",
            "notification",
            "refund_title",
            "refund_slug",
            "refund_desc",
        ];


}
