<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='kehadiran';
    protected $fillable = [
        'id',
        'id_user',
        'tanggal',
        'check_in',
        'check_out',
        'status',
        'lokasi',
        'keterangan'
        

    ];

}
