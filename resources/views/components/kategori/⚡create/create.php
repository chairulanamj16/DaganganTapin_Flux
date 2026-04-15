<?php

use App\Livewire\Forms\KategoriForm;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;
    public KategoriForm $form;

    public function save()
    {
        $this->form->store();
        Flux::modal('add-kategori')->close();
        Flux::toast(variant: "success", heading: "Tersimpan", text: "Kategori berhasil disimpan!");
        $this->redirectRoute('kategori.index', navigate: true);
    }

    public function UpdatedFormKategori($value)
    {
        $this->form->slug = str()->slug($value);
    }
};
