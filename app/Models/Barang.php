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
        'deskripsi',
        'kategori_id',
        'jumlah_barang',
        'harga',
        'satuan',
        'image',
    ];

    public function kategori()
    {
        return $this->belongsTo(Categories::class, 'kategori_id');
    }

    public static function booted()
    {
        static::creating(function ($user) {
            $user->uuid = Str::uuid();
        });
    }
}
