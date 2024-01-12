<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'mahasiswa';
    public $fillable = ['id_user','nim','nama_mhs','jenis_kelamin','alamat','no_telp'];
}
