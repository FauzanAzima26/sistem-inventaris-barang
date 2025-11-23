<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiHeader extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksi_header';

    protected $fillable = [
        'uuid',
        'kode_transaksi',
        'jenis_transaksi',
        'tgl_transaksi',
        'total_item',
        'keterangan',
    ];

    public function items()
    {
        return $this->hasMany(TransaksiItem::class, 'transaksi_id');
    }

    protected static function booted()
    {
        static::creating(function ($transaksi) {

            // UUID
            $transaksi->uuid = Str::uuid();

            // Generate kode: TRX-00001, TRX-00002 ...
            $latest = self::orderBy('kode_transaksi', 'desc')->first();
            $lastNumber = $latest ? intval(substr($latest->kode_transaksi, 4)) : 0;

            $next = $lastNumber + 1;
            $transaksi->kode_transaksi = 'TRX-' . str_pad($next, 5, '0', STR_PAD_LEFT);
        });
    }
}
