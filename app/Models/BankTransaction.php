<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    use HasFactory;



                public function from_acc_f()
                {
                    return $this->belongsTo(Bank::class, 'from_acc');
                }

                public function to_acc_f()
                {
                    return $this->belongsTo(Bank::class, 'to_acc');
                }




}
