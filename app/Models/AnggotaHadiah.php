<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaHadiah extends Model
{
    use HasFactory;
    protected $table = "anggota_hadiah";
    protected $fillable = ['anggota_id', 'hadiah_id'];
}
