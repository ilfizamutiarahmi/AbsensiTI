<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'jadwal';
    public $fillable = ['id_kelas','id_matkul','id_tahunajar','ruang','jam_mulai','jam_akhir'];

}
