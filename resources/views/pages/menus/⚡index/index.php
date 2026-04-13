<?php

use App\Models\Menu;
use Livewire\Component;

new class extends Component {
    public $sortBy, $sortDirection;

    // Form
    public $name, $subdomain, $icon, $order, $parent_menu;

    public function with()
    {
        $data['menus'] = Menu::paginate(5);
        return $data;
    }

    public function sort($field)
    {
        if ($this->sortBy === $field) {
            // kalau klik kolom yang sama → toggle asc/desc
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            // kalau kolom baru → default asc
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function simpan()
    {
        $this->validate([
            'name' => 'required|string',
            'subdomain' => 'required|string',
            'icon' => 'required|string',
            'order' => 'required|string',
            'parent_menu' => 'nullable|string',
        ]);

        $menu = new Menu();
        $menu->uuid = str()->uuid();
        $menu->name = $this->name;
        $menu->subdomain = $this->subdomain;
        $menu->icon = $this->icon;
        $menu->order = $this->order;
        $menu->permission_view = 'view_' . $this->subdomain;
        $menu->parent_id = $this->parent_menu;
        $menu->save();
    }
};
