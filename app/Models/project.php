<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;




    public function party_f()
    {
        return $this->belongsTo(party::class, 'party_id', 'id' );
    }


    //
    // public function trip_transaction_advance_f()
    // {
    //     return $this->hasMany(transaction::class, 'to_trip_id', 'id' );
    // }
    //
    // public function trip_transaction_income_f()
    // {
    //     return $this->hasMany(transaction::class, 'from_trip_id', 'id' );
    // }
    //
    //
    // public function drivers()
    // {
    //     return $this->belongsTo(staff::class, 'driver_id' , 'id');
    // }
    //
    // public function helpers()
    // {
    //     return $this->belongsTo(staff::class, 'helper_id' , 'id');
    // }
    //
    // public function vehicles()
    // {
    //     return $this->belongsTo(vehicle::class, 'vehicle_id' , 'id');
    // }
    //
    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'entry_by' , 'id');
    // }




}
