<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'barang';
    protected $guarded = ['id', 'created_at', 'updated_at'];

}

interface Perabotan
{
    public function defineAlat();
}

class Alat implements Perabotan
{
    public function defineAlat()
    {
        return 'default_nama_alat';
    }
}

class Perkakas implements Perabotan
{
    public function defineAlat()
    {
        return 'default_nama_perkakas';
    }
}

$alat = new Alat();
echo $alat->defineAlat();

$perkakas = new Perkakas();
echo $perkakas->defineAlat();


