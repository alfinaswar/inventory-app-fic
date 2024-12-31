<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangKeluar extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'barang_keluars';
    protected $guarded = ['id'];
    public function barang()
    {
        return $this->hasOne(MasterBarang::class, 'id', 'kode_barang');
    }

}
