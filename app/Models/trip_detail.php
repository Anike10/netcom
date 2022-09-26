<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trip_detail extends Model
{
    use HasFactory;

    public function trip_id_f()
    {
        return $this->belongsTo(trip::class,'trip_id' , 'id' );
    }




    public function in_purpose_f()
    {
        return $this->belongsTo(in_purpose::class, 'in_purpose' ,  'id' );
    }

    public function ex_purpose_f()
    {
        return $this->belongsTo(ex_purpose::class, 'ex_purpose' ,  'id' );
    }

    public function parties()
    {
        return $this->belongsTo(party::class, 'party' ,  'id' );
    }



}
