<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inventory';

    protected $fillable = [
        'barang_id',
        'stok',
    ];

    public static function booted()
    {
        static::creating(function ($inventory) {
            $inventory->uuid = Str::uuid();
        });
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
