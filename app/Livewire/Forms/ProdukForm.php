<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
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
            'gambar' => ['nullable', Rule::requiredIf(!$this->product), 'mimes:jpeg,jpg,png,gif'],
            'status' => ['required', 'in:active,non_active'],
        ];
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
        $this->category_id = $product->category_id;
        $this->shop_id = $product->shop_id;
        $this->title = $product->title;
        $this->desc = $product->desc;
        $this->price = $product->price;
        $this->discount = $product->discount;
        $this->stock = $product->stock;
        $this->status = $product->status;
    }

    public function store()
    {
        $this->product = null;
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

    public function update()
    {
        $this->validate();
        $category_id = Category::where('uuid', $this->category_id)->first()->id;

        $product = $this->product;
        $product->category_id = $category_id;
        $product->shop_id = $this->shop_id;
        $product->title = $this->title;
        $product->desc = $this->desc;
        $product->price = $this->price;
        $product->discount = $this->discount;
        $product->stock = $this->stock;
        if ($this->thumb) {
            File::delete('storage/' . $product->thumb);
            $product->thumb = $this->thumb->store('assets/product/thumb', 'public');
        }
        if ($this->gambar) {
            File::delete('storage/' . $product->gambar);
            $product->gambar = $this->gambar->store('assets/product/gambar', 'public');
        }
        $product->status = $this->status;
        $product->save();
    }
}
