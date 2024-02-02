<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAbsensi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'detail_absensi';
    public $fillable = ['id_absensi','id_mhs','status','keterangan'];
}
