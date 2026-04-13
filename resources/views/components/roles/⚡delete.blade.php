<?php

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Livewire\Forms\RoleForm;
new class extends Component {
    public Role $role;
    public RoleForm $form;

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function destroy(Role $role)
    {
        $this->form->delete($role);
        Flux::modal('delete-role-' . $role->id)->close();
        Flux::toast(variant: 'success', heading: 'Terhapus', text: 'berhasil menghapus data');
        $this->redirectRoute('roles.index', navigate: true);
    }
};
?>

<div>
    <x-ui.modal-action name="delete-role-{{ $role->id }}">
        <x-slot:trigger>
            <flux:button variant="danger" size="xs">
                <i class="fas fa-trash fa-fw"></i>
                Hapus
            </flux:button>
        </x-slot:trigger>
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Hapus Data?</flux:heading>
                <flux:text class="mt-2">
                    Anda akan menghapus proyek ini.<br>
                    Tindakan ini tidak dapat dibatalkan.
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">
                        Batal
                    </flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="danger" wire:click='destroy({{ $role->id }})'>
                    Hapus Data
                </flux:button>
            </div>
        </div>
    </x-ui.modal-action>
</div>
