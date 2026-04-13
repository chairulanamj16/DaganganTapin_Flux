<?php

use App\Livewire\Forms\MenuForm;
use App\Models\Menu;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    public MenuForm $form;

    #[Computed]
    public function parent_menus()
    {
        return Menu::where('parent_id', null)->get();
    }

    public function save()
    {
        $this->form->store();
        Flux::modal('add-menus')->close();
        Flux::toast(variant: 'success', heading: 'Tersimpan', text: 'berhasil menyimpan data');
        $this->redirectRoute('menus.index', navigate: true);
    }
};
