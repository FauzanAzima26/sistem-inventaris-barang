<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kode_barang',
        'nama',
        'kategori_id',
        'harga_beli',
        'satuan',
        'image',
    ];

    public function kategori()
    {
        return $this->belongsTo(Categories::class, 'kategori_id');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function transaksiItems()
    {
        return $this->hasMany(TransaksiItem::class, 'barang_id');
    }

    protected static function booted()
    {
        // AUTO GENERATE saat CREATE
        static::creating(function ($barang) {
            $barang->uuid = Str::uuid();

            if (!$barang->kode_barang) {
                $last = Barang::latest('id')->first();
                $number = $last ? $last->id + 1 : 1;
                $barang->kode_barang = 'B' . str_pad($number, 3, '0', STR_PAD_LEFT);
            }
        });

        // AUTO GENERATE saat UPDATE JIKA DIKOSONGKAN
        static::updating(function ($barang) {

            // Jika user sengaja kosongi → generate kode baru
            if ($barang->kode_barang === null || $barang->kode_barang === '') {

                $last = Barang::latest('id')->first();
                $number = $last ? $last->id + 1 : 1;

                $barang->kode_barang = 'B' . str_pad($number, 3, '0', STR_PAD_LEFT);
            }
        });
    }
}
