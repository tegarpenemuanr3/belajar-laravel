<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //digunakan untuk softdeletes

class Program extends Model
{

    use SoftDeletes; //digunakan untuk softdeletes

    //ini digunakan ketika nama table tidak sama 
    // protected $table = 'edulevels';

    //protected $fillable = ['name', 'edulevel_id']; //field apa saja yang boleh diisi

    protected $guarded = []; //field apa saja yg tidak boleh diisi

    protected $hidden = ['created_at', 'updated_at']; //hidden data dari data model

    public function edulevel() //nama function secara otomatis akan menjadi nama variabel pada view untuk mengeambil data
    {
        return $this->belongsTo(Edulevel::class); //relasi one to one ketika akan menampilkan data foreign key
    }
}
