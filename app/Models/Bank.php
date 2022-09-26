<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;


// hasMany(Comment::class, 'foreign_key', 'local_key');


public function transaction_to_f()
{
    return $this->hasMany(transaction::class, 'to_acc');
}

public function transaction_from_f()
{
    return $this->hasMany(transaction::class, 'from_acc');
}


public function users_f()
{
    return $this->belongsTo(User::class, 'entry_by' , 'id' );
}




}
