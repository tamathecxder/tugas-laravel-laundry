<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    public $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'tb_paket';
    protected $fillable = [
        'id_outlet',
        'jenis',
        'nama_paket',
        'harga',
    ];

}

class PaketJenis {
    public static $jenis = [
        'kaos' => 'kaos',
		'kiloan' => 'kiloan',
		'selimut' => 'selimut',
		'bed_cover' => 'bed_cover',
		'lainnya' => 'lain',
    ];
}
