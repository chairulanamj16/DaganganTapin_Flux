<?php

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\Attributes\Computed;
use Spatie\Permission\Models\Permission;
use App\Livewire\Forms\RoleForm;

new class extends Component {
    public Role $role;

    public RoleForm $form;

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->form->name = $role->name;
        $this->form->selectedPermissions = $role->permissions->pluck('id')->map(fn($id) => (string) $id)->toArray();
    }

    #[Computed]
    public function permissions()
    {
        return Permission::all();
    }

    public function save()
    {
        $this->form->update($this->role);
        Flux::toast(variant: 'success', heading: 'Tersimpan', text: 'berhasil menyimpan data');
        $this->redirectRoute('roles.index', navigate: true);
    }
};
?>

<div>
    <x-ui.modal-action name="edit-role-{{ $role->id }}" flyout>
        <form wire:submit.event='save'>
            <x-slot:trigger>
                <flux:button variant="primary" size="xs">
                    <i class="fas fa-edit fa-fw"></i>
                    Edit
                </flux:button>
            </x-slot:trigger>
            <div class="space-y-4">
                <flux:input label="Nama" placeholder="Nama..." wire:model='form.name' />
                <div wire:ignore class="relative">
                    <label for="permissions">Permissions</label>
                    <div class="mt-1" />
                    <select id="permissions-{{ $role->id }}" multiple>
                        @foreach ($this->permissions as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-100 flex justify-center space-x-2 bottom-5 left-2 right-2 absolute">
                <flux:modal.close class="w-40">
                    <flux:button class="w-40">Batal</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="primary" class="w-40">Simpan</flux:button>
            </div>
        </form>
    </x-ui.modal-action>
</div>
@push('js')
    <script data-navigate-once>
        function initTomSelectEdit{{ $role->id }}() {
            const el = document.querySelector('#permissions-{{ $role->id }}');
            if (!el) return;

            if (el.tomselect) {
                el.tomselect.destroy();
            }

            new TomSelect(el, {
                plugins: ['remove_button'],
                create: false,
                maxItems: null,
                valueField: 'value',
                labelField: 'text',
                searchField: 'text',
                placeholder: 'Pilih permission...',
                items: @js($form->selectedPermissions),

                onChange: function(values) {
                    const normalized = Array.isArray(values) ?
                        values.map(v => parseInt(v)) :
                        (values ? [parseInt(values)] : []);

                    @this.set('form.selectedPermissions', normalized);
                },
            });

            el.tomselect.setValue(@js($form->selectedPermissions), true);
        }

        initTomSelectEdit{{ $role->id }}();
    </script>
@endpush
