<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::forceDeleted(function ($category) {
            if ($category->logo && Storage::disk('public')->exists($category->logo)) {
                Storage::disk('public')->delete($category->logo);
            }
        });
    }
}
