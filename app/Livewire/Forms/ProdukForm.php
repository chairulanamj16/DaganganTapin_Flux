<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class ProdukForm extends Form
{
    public ?Product $product = null;

    public $category_id = null;
    public $shop_id = null;
    public $title = '';
    public $desc = null;
    public $price = 0;
    public $discount = 0;
    public $stock = 0;
    public TemporaryUploadedFile|string|null $thumb = null;
    public TemporaryUploadedFile|string|null $gambar = null;
    public $status = 'non_active';

    public function rules()
    {
        return [
            'category_id' => ['required', 'exists:categories,uuid'],
            'shop_id' => ['nullable', 'exists:shops,id'],
            'title' => ['required', 'string'],
            'desc' => ['nullable', 'string'],
            'price' => ['required'],
            'discount' => ['nullable'],
            'stock' => ['required'],
            'thumb' => ['nullable', 'mimes:jpeg,jpg,png,gif'],
            'gambar' => ['required', 'mimes:jpeg,jpg,png,gif'],
            'status' => ['required', 'in:active,non_active'],
        ];
    }

    public function store()
    {
        $this->validate();
        $category_id = Category::where('uuid', $this->category_id)->first()->id;
        $product = new Product();
        $product->uuid = str()->uuid();
        $product->category_id = $category_id;
        $product->shop_id = $this->shop_id;
        $product->title = $this->title;
        $product->desc = $this->desc;
        $product->price = $this->price;
        $product->discount = $this->discount;
        $product->stock = $this->stock;
        if ($this->thumb) {
            $product->thumb = $this->thumb->store('assets/product/thumb', 'public');
        }
        $product->gambar = $this->gambar->store('assets/product/gambar', 'public');
        $product->status = $this->status;
        $product->save();
    }
}
