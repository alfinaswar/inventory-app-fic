<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangMasuk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'barang_masuks';
    protected $guarded = ['id'];

    public function supplier()
    {
        return $this->hasOne(MasterSupplier::class, 'id', 'supplier_id');
    }
    public function gudang()
    {
        return $this->hasOne(MasterGudang::class, 'id', 'lokasi_gudang');
    }
    public function barang()
    {
        return $this->hasOne(MasterBarang::class, 'id', 'kode_barang');
    }
}
