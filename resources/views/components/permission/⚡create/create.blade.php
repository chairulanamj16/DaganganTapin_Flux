<div>
    <x-ui.modal-action name="add-permission" flyout>
        <form wire:submit.prevent='save'>
            <x-slot:trigger>
                <flux:button>
                    <i class="fas fa-plus fa-fw"></i>
                    Tambah Permission
                </flux:button>
            </x-slot:trigger>
            <div class="space-y-4">
                <flux:heading size="lg">
                    Tambah Permission
                </flux:heading>
                <flux:input label="Permission" placeholder="Permission" wire:model="form.name" autofocus />
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