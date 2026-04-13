<div>
    <flux:card>
        <livewire:permission.create />
        <div class="mt-2" />
        <x-ui.filter-data></x-ui.filter-data>
        <div class="mt-2" />
        <flux:table :paginate="$this->permissions">
            <flux:table.columns sticky>
                <flux:table.column sticky align="center">
                    No
                </flux:table.column>
                <flux:table.column sortable :sorted="$sortBy === 'name'" :direction="$sortDirection"
                    wire:click="sort('name')">
                    Permission
                </flux:table.column>
                <flux:table.column align="center">
                    <i class="fas fa-cog fa-fw"></i>
                </flux:table.column>
                <flux:table.column>
                    <i class="brush"></i>
                </flux:table.column>
            </flux:table.columns>
            @forelse ($this->permissions as $permission)
                <flux:table.columns>
                    <flux:table.cell class="text-center">{{ $loop->iteration }}</flux:table.cell>
                    <flux:table.cell>{{ $permission->name }}</flux:table.cell>
                    <flux:table.cell class="text-center">
                        <x-ui.modal-action name="delete-{{ $loop->iteration }}">
                            <x-slot:trigger>
                                <flux:button variant="danger" size="sm">
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
                                    <flux:button type="submit" variant="danger"
                                        wire:click='destroy({{ $permission->id }})'>
                                        Hapus Data
                                    </flux:button>
                                </div>
                            </div>
                        </x-ui.modal-action>
                    </flux:table.cell>
                </flux:table.columns>
            @empty
                <flux:table.columns>
                    <flux:table.cell colspan="3" class="text-center">
                        Data Masih Kosong
                    </flux:table.cell>
                </flux:table.columns>
            @endforelse
        </flux:table>
    </flux:card>
</div>
