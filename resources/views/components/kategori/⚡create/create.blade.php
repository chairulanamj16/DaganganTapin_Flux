<div>
    <x-ui.modal-action name="add-kategori" flyout>
        <form wire:submit.event='save'>
            <x-slot:trigger>
                <flux:button>
                    <i class="fas fa-plus fa-fw"></i>
                    Tambah Kategori
                </flux:button>
            </x-slot:trigger>
            <div class="space-y-6">
                <flux:input label="Kategori" placeholder="Kategori..." wire:model.live='form.kategori' />
                <flux:input label="Slug" placeholder="Slug..." wire:model.live='form.slug' readonly />
                <flux:input label="Logo" placeholder="Logo..." wire:model.live='form.logo' type="file"
                    accept=".png,.jpg,.jpeg" />
            </div>
            <div class="w-100 flex justify-center space-x-2 bottom-5 left-2 right-2 absolute">
                <flux:modal.close class="w-40">
                    <flux:button class="w-40">Batal</flux:button>
                </flux:modal.close>
                <flux:button variant="primary" class="w-40" type="submit">Simpan</flux:button>
            </div>
        </form>
    </x-ui.modal-action>
</div>
