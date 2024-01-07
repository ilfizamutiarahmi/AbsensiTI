<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kelas';
    public $fillable = ['nama_kelas','nama_pa'];

}
