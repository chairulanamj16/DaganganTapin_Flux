<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{
    public $name = '';
    public array $selectedPermissions = [];

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'selectedPermissions' => 'nullable|array',
            // 'selectedPermissions.*' => 'integer',
        ];
    }

    public function store()
    {
        $this->validate();
        $permissions = Permission::whereIn('id', $this->selectedPermissions)->pluck('name')->toArray();
        $role = new Role();
        $role->name = $this->name;
        $role->save();
        $role->syncPermissions($permissions);
        $this->reset();
    }

    public function update(Role $role)
    {
        $this->validate();
        $role->update([
            'name' => $this->name,
        ]);

        $role->syncPermissions($this->selectedPermissions);
        if (empty($this->selectedPermissions)) {
            $role->permissions()->detach(); // Jika tidak ada permission yang dipilih, hapus
            return;
        }
        $role->syncPermissions([$this->selectedPermissions]);
    }

    public function delete(Role $role)
    {
        $role->delete();
    }
}
