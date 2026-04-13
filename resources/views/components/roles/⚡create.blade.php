<?php

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\Attributes\Computed;
use App\Livewire\Forms\RoleForm;
new class extends Component {
    public RoleForm $form;

    #[Computed]
    public function permissions()
    {
        return Permission::all();
    }

    public function save()
    {
        $this->form->store();
        Flux::modal('add-roles')->close();
        Flux::toast(variant: 'success', heading: 'Tersimpan', text: 'berhasil menyimpan data');
        $this->redirectRoute('roles.index', navigate: true);
    }
};
?>

<div>
    <x-ui.modal-action name="add-roles" flyout>
        <form wire:submit.prevent='save'>
            <x-slot:trigger>
                <flux:button>
                    <i class="fas fa-plus fa-fw"></i>
                    Tambah Roles
                </flux:button>
            </x-slot:trigger>
            <div class="space-y-4">
                <flux:input label="Nama" placeholder="Nama..." wire:model='form.name' />
                <div wire:ignore class="relative">
                    <label for="permissions">Permissions</label>
                    <div class="mt-1" />
                    <select id="permissions" multiple>
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

    @push('js')
        <script>
            tomSelect();

            function tomSelect() {
                new TomSelect('#permissions', {
                    plugins: ['remove_button'],
                    create: false,
                    maxItems: null,
                    valueField: 'id',
                    labelField: 'name',
                    searchField: 'name',
                    placeholder: 'Pilih permission...',
                    onChange: (values) => {
                        const normalized = Array.isArray(values) ?
                            values.map(v => parseInt(v)) :
                            (values ? [parseInt(values)] : []);
                        @this.set('form.selectedPermissions', normalized);
                    },
                });
            }
        </script>
    @endpush
</div>
