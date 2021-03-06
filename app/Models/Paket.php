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
        'outlet_id',
        'jenis',
        'nama_paket',
        'harga',
    ];

    public function detail() {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function outlet() {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaks::class);
    }

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
