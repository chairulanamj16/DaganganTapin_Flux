<?php

use App\Livewire\Forms\ProdukForm;
use App\Models\Category;
use App\Models\Product;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;
    public Product $product;
    public ProdukForm $form;

    public function mount($product)
    {
        $this->product = $product;
        $this->form->setProduct($product);
    }

    #[Computed]
    public function categories()
    {
        return Category::orderBy('kategori', 'ASC')->get();
    }

    public function save()
    {
        $this->form->update();
        Flux::modal('add-produk')->close();
        Flux::toast(variant: "success", heading: "Tersimpan", text: "Produk berhasil disimpan!");
        $this->redirectRoute('produk.index', navigate: true);
    }
};
