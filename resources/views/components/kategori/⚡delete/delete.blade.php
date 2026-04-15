<div>
    <x-ui.modal-action name="delete-kategori-{{ $category->uuid }}">
        <x-slot:trigger>
            <flux:button size="sm" variant="danger">
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
                <flux:button type="submit" variant="danger" wire:click='destroy'>
                    Hapus Data
                </flux:button>
            </div>
        </div>
    </x-ui.modal-action>
</div>
