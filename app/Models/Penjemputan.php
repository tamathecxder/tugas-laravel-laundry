<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjemputan extends Model
{
    use HasFactory;

    public $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'tb_penjemputan';
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }

}
