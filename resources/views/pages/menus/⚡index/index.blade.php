<div>
    <flux:card>
        <x-ui.modal-action name="add-menus" class="relative" flyout>
            <x-slot:trigger>
                <flux:button>Buat Menu</flux:button>
            </x-slot:trigger>
            <div class="space-y-4 ">
                <flux:heading size="lg">Tambah Menu</flux:heading>
                <flux:input label="Nama menu" wire:model='name' />
                <flux:input label="Subdomain" wire:model='subdomain' />
                <flux:input label="Icon" wire:model='icon' />
                <flux:input label="Order " wire:model='order' type="number" />
                <flux:select label="Parent Menu">
                    <flux:select.option value="null">
                        Null
                    </flux:select.option>
                </flux:select>
            </div>

            <div class="w-100 flex justify-center space-x-2 bottom-5 left-2 right-2 absolute">
                <flux:modal.close class="w-40">
                    <flux:button class="w-40">Batal</flux:button>
                </flux:modal.close>

                <flux:button variant="primary" class="w-40" wire:click='simpan'>Simpan</flux:button>
            </div>
        </x-ui.modal-action>
        <div class="mt-5" />
        <x-ui.filter-data></x-ui.filter-data>
        <div class="mt-5" />
        <flux:table :paginate="$menus">
            <flux:table.columns>
                <flux:table.column sortable :sorted="$sortBy === 'no'" :direction="$sortDirection"
                    wire:click.live="sort('no')">
                    No
                </flux:table.column>
                <flux:table.column sortable :sorted="$sortBy === 'name'" :direction="$sortDirection"
                    wire:click="sort('name')">
                    Nama
                </flux:table.column>
                <flux:table.column sortable :sorted="$sortBy === 'subdomain'" :direction="$sortDirection"
                    wire:click="sort('subdomain')">
                    Subdomain
                </flux:table.column>
                <flux:table.column sortable :sorted="$sortBy === 'icon'" :direction="$sortDirection"
                    wire:click="sort('icon')">
                    Icon
                </flux:table.column>
                <flux:table.column sortable :sorted="$sortBy === 'order'" :direction="$sortDirection"
                    wire:click="sort('order')">
                    Order
                </flux:table.column>
                <flux:table.column sortable :sorted="$sortBy === 'parent_menu'" :direction="$sortDirection"
                    wire:click="sort('parent_menu')">
                    Parent Menu
                </flux:table.column>
                <flux:table.column>
                    <i class="fas fa-cog fa-fw"></i>
                </flux:table.column>
            </flux:table.columns>
            <flux:table.rows>
                @forelse ($menus as $menu)
                    <flux:table.row>
                        <flux:table.cell>
                            {{ $loop->iteration }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ $menu->name }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ $menu->subdomain }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ $menu->icon }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ $menu->order }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ $menu->parent_id }}
                        </flux:table.cell>
                    </flux:table.row>

                @empty
                    <flux:table.row>
                        <flux:table.cell colspan="6" class="text-center">
                            Data Masih Kosong
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse
            </flux:table.rows>
        </flux:table>
    </flux:card>
</div>
