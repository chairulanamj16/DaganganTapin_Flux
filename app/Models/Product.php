<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::forceDeleted(function ($product) {
            if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
                Storage::disk('public')->delete($product->gambar);
            }
            if ($product->thumb && Storage::disk('public')->exists($product->thumb)) {
                Storage::disk('public')->delete($product->thumb);
            }
        });
    }
}
