<?php

use App\Livewire\Forms\MenuForm;
use App\Models\Menu;
use Flux\Flux;
use Livewire\Component;

new class extends Component
{
    public MenuForm $form;
    public Menu $menu;

    public function mount(Menu $menu)
    {
        $this->menu = $menu;
        $this->form->setMenu($menu);
    }

    public function destroy()
    {
        $this->form->delete();
        Flux::modal('delete-menu-' . $this->menu->uuid)->close();
        Flux::toast(variant: 'success', heading: 'Terhapus', text: 'berhasil menghapus data');
        $this->redirectRoute('menus.index', navigate: true);
    }
};
