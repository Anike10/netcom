<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
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

    public function income_purpose_f()
    {
        return $this->belongsTo(in_purpose::class, 'income_purpose');
    }


    public function to_party_f()
    {
        return $this->belongsTo(party::class, 'to_party_id');
    }

}
