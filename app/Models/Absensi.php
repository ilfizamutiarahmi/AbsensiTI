<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'absensi';
    public $fillable = ['id_jadwal','tanggal'];

}
