<?php

use App\Livewire\Forms\MenuForm;
use App\Models\Menu;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public MenuForm $form;
    public Menu $menu;

    public function mount($menu)
    {
        $this->menu = $menu;
        $this->form->setMenu($menu);
    }

    #[Computed]
    public function parent_menus()
    {
        return Menu::where('parent_id', null)->get();
    }

    public function UpdatedFormSubdomain($value)
    {
        $this->form->permission_view = 'view_' . $value;
    }

    public function save()
    {
        $this->form->update($this->menu);
        Flux::modal('edit-menu-' . $this->menu->uuid)->close();
        Flux::toast(variant: 'success', heading: 'Tersimpan', text: 'berhasil menyimpan data');
        $this->redirectRoute('menus.index', navigate: true);
    }
};
