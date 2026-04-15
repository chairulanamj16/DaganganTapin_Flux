<?php

use App\Livewire\Forms\ProdukForm;
use App\Models\Category;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;
    public ProdukForm $form;

    public function save()
    {
        $this->form->store();
        Flux::modal('add-produk')->close();
        Flux::toast(variant: "success", heading: "Tersimpan", text: "Produk berhasil disimpan!");
        $this->redirectRoute('produk.index', navigate: true);
    }

    #[Computed]
    public function categories()
    {
        return Category::orderBy('kategori', 'ASC')->get();
    }
};
