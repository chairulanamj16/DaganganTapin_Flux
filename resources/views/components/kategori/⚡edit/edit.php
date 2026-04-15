<?php

use App\Livewire\Forms\KategoriForm;
use App\Models\Category;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;
    public Category $category;
    public KategoriForm $form;

    public function mount($category)
    {
        $this->category = $category;
        $this->form->setCategory($category);
    }

    public function updatedFormKategori($value)
    {
        $this->form->slug = str()->slug($value);
    }

    public function save()
    {
        $this->form->update();
        Flux::modal('edit-kategori-' . $this->category->uuid)->close();
        Flux::toast(variant: 'success', heading: "Terupdate", text: "Berhasil mengupdate data.");
        $this->redirectRoute('kategori.index', navigate: true);
    }
};
