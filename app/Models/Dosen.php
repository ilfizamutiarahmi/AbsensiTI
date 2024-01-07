<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'dosen';
    public $fillable = ['id_user','nip','nama_dosen','jenis_kelamin','alamat','no_hp'];

}
