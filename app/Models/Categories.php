<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public static function booted()
    {
        static::creating(function ($kategori) {
            $kategori->uuid = Str::uuid();
        });
    }
}
