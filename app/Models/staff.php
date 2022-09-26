<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;

protected $table = 'staffs';

    public function transaction_out_f()
    {
        return $this->hasMany(transaction::class, 'from_staff_id' , 'id' );
    }

    public function transaction_in_f()
    {
        return $this->hasMany(transaction::class, 'to_staff_id' , 'id' );
    }


    public function users_f()
    {
        return $this->belongsTo(User::class, 'entry_by' , 'id' );
    }






}
