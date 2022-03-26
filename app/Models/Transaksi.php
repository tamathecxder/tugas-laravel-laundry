<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaksi
 */
class Transaksi extends Model
{
    /**
     * @var array
     */
    use HasFactory;

    public $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'tb_transaksi';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     * Relasi dengan model outlet
     */
    public function outlet() {
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     * Relasi dengan model member
     */
    public function member() {
        return $this->belongsTo(Member::class, 'id_member', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     * Relasi dengan model paket
     */
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     * Relasi dengan model user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     * Relasi hasMany dengan model detail_transaksi
     */
    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

}
