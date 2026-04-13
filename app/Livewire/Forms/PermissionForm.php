<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Spatie\Permission\Models\Permission;

class PermissionForm extends Form
{
    public string $name = '';

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|unique:permissions,name',
        ];
    }

    public function store()
    {
        $this->validate();

        Permission::create($this->only('name'));
        $this->reset();
    }
}
