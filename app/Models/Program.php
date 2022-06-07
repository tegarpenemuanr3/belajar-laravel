<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{

    //ini digunakan ketika nama table tidak sama 
    protected $table = 'edulevels';

    public function edulevel()
    {
        return $this->belongsTo(Edulevel::class);
    }
}
