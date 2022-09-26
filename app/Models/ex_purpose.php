<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ex_purpose extends Model
{
    use HasFactory;

    public function ex_purpose_f()
    {
        return $this->ex_purpose(Bank::class, 'ex_purpose');
    }

}
