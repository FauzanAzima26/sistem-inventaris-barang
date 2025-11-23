<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksi_item';

    protected $fillable = [
        'transaksi_id',
        'barang_id',
        'jumlah',
        'harga_satuan',
        'subtotal',
    ];

    public function header()
    {
        return $this->belongsTo(TransaksiHeader::class, 'transaksi_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public static function booted()
    {
        static::creating(function ($transaksi) {
            $transaksi->uuid = Str::uuid();
        });
    }
}
