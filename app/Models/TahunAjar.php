<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjar extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tahun_ajar';
    public $fillable = ['tahun_ajar','semester'];
}
