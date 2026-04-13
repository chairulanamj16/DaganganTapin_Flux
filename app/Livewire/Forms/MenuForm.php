<?php

namespace App\Livewire\Forms;

use App\Models\Menu;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MenuForm extends Form
{
    public $name, $subdomain, $icon, $order, $parent_menu;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:menus,name',
            'subdomain' => 'nullable|string|unique:menus,subdomain',
            'icon' => 'nullable|string',
            'order' => 'required|string',
            'parent_menu' => 'nullable',
        ];
    }

    public function store()
    {
        $this->validate();
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
}
