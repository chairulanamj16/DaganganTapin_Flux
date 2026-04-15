<?php

use App\Livewire\Forms\KategoriForm;
use App\Models\Category;
use Flux\Flux;
use Livewire\Component;

new class extends Component
{
    public KategoriForm $form;
    public Category $category;
    public function mount($category)
    {
        $this->category = $category;
        $this->form->setCategory($category);
    }

    public function destroy()
    {
        $this->form->delete();
        Flux::modal('delete-kategori-' . $this->category->uuid)->close();
        Flux::toast(variant: 'success', heading: "Terhapus", text: "Berhasil menghapus data.");
        $this->redirectRoute('kategori.index', navigate: true);
    }
};
