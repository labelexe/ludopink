<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "userid",
        "order_id",
        "txn_id",
        "amount",
        "status",
        "trans_date",
        "created_at",
        ];
}
