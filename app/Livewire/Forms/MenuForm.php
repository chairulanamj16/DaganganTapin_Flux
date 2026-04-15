<?php

namespace App\Livewire\Forms;

use App\Models\Menu;
use Illuminate\Validation\Rule;
use Livewire\Form;

class MenuForm extends Form
{
    public ?Menu $menu = null;

    public $name = '';
    public $subdomain = '';
    public $icon = '';
    public $order = '';
    public $parent_menu = null;
    public $permission_view = '';

    protected function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('menus', 'name')->ignore($this->menu),
            ],
            'subdomain' => [
                'nullable',
                'string',
                Rule::unique('menus', 'subdomain')->ignore($this->menu),
            ],
            'icon' => ['nullable', 'string'],
            'order' => ['required', 'integer'],
            'parent_menu' => ['nullable'],
            'permission_view' => ['nullable', 'string'],
        ];
    }

    public function setMenu(Menu $menu): void
    {
        $this->menu = $menu;
        $this->name = $menu->name;
        $this->subdomain = $menu->subdomain;
        $this->icon = $menu->icon;
        $this->order = $menu->order;
        $this->parent_menu = $menu->parent_id;
        $this->permission_view = $menu->permission_view;
    }

    public function store()
    {
        $this->menu = null;
        $this->validate();

        $menu = new Menu();
        $menu->uuid = (string) str()->uuid();
        $menu->name = $this->name;
        $menu->subdomain = $this->subdomain;
        $menu->icon = $this->icon;
        $menu->order = $this->order;
        $menu->permission_view = $this->permission_view;
        $menu->parent_id = $this->parent_menu;
        $menu->save();
    }

    public function update()
    {
        $this->validate();

        $this->menu->update([
            'name' => $this->name,
            'subdomain' => $this->subdomain,
            'icon' => $this->icon,
            'order' => $this->order,
            'permission_view' => 'view_' . $this->subdomain,
            'parent_id' => $this->parent_menu,
        ]);
    }

    public function delete()
    {
        $this->menu->delete();
    }
}
