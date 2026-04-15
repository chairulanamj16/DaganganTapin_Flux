<?php

use Livewire\Component;
use App\Concerns\Toastable;
use App\Livewire\Forms\PermissionForm;
use Flux\Flux;

new class extends Component {
    public PermissionForm $form;
    use Toastable;
    public function save()
    {
        $this->form->store();
        Flux::modal('add-permission')->close();
        Flux::toast(variant: 'success', heading: 'Tersimpan', text: 'berhasil menyimpan data');
        $this->redirectRoute('permissions.index', navigate: true);
    }
};
