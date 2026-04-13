<div>
    <x-ui.modal-action name="add-menus" class="relative" flyout>
        <form wire:submit.even='save'>
            <x-slot:trigger>
                <flux:button>Buat Menu</flux:button>
            </x-slot:trigger>
            <div class="space-y-4 ">
                <flux:heading size="lg">Tambah Menu</flux:heading>
                <flux:input label="Nama menu" wire:model='form.name' />
                <flux:input label="Subdomain" wire:model='form.subdomain' />
                <flux:input label="Icon" wire:model='form.icon' />
                <flux:input label="Order " wire:model='form.order' type="number" />
                <flux:select label="Parent Menu" wire:model='form.parent_menu'>
                    <flux:select.option value="">
                        Null
                    </flux:select.option>
                    @forelse ($this->parent_menus as $item)
                        <flux:select.option value="{{ $item->id }}">
                            {{ $item->name }}
                        </flux:select.option>
                    @empty
                        <flux:select.option value="">
                            Belum ada menu
                        </flux:select.option>
                    @endforelse
                </flux:select>
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
