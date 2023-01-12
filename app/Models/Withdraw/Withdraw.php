<?php

namespace App\Models\Withdraw;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        "userid",
        "amount",
        "payment_method",
        "wallet_number",
        "bank_name",
        "account_number",
        "ifsc_code",
        "withdrawstatus",
        "transaction_id",
        "created_at",
        ];
}
