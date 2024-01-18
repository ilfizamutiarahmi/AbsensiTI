<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatakuliahModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'matakuliah';
    public $fillable = ['nama_matkul','jml_sks','id_dosen'];

}
