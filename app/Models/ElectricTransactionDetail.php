<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectricTransactionDetail extends Model
{
    use HasFactory;

    public function transactionHeader(){
        return $this->belongsTo(TransactionHeader::class);
    }
}
