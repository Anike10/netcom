<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;

    public function users_f()
    {
        return $this->belongsTo(User::class, 'entry_by' , 'id' );
    }




}
