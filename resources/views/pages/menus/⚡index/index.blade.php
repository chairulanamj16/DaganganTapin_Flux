<div>
    <flux:card>
        <livewire:menus.create />
        <div class="mt-5" />
        <x-ui.filter-data></x-ui.filter-data>
        <div class="mt-5" />
        <flux:table :paginate="$this->menus">
            <flux:table.columns>
                <flux:table.column align="center">
                    No
                </flux:table.column>
                <flux:table.column>
                    Nama
                </flux:table.column>
                <flux:table.column>
                    Subdomain
                </flux:table.column>
                <flux:table.column>
                    Icon
                </flux:table.column>
                <flux:table.column>
                    Order
                </flux:table.column>
                <flux:table.column>
                    Parent Menu
                </flux:table.column>
                <flux:table.column>
                    <i class="fas fa-cog fa-fw"></i>
                </flux:table.column>
            </flux:table.columns>
            <flux:table.rows wire:sort='handleSort'>
                @forelse ($this->menus as $menu)
                    <flux:table.row wire:key="{{ $menu->id }}" wire:sort:item="{{ $menu->id }}"
                        class="bg-black/25">
                        <flux:table.cell class="text-center">
                            {{ $loop->iteration }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ $menu->name }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ $menu->subdomain }}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:icon name="{{ $menu->icon ?? 'minus' }}" />
                            <span class="text-[10px]">
                                {{ $menu->icon }}
                            </span>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ $menu->order }}
                        </flux:table.cell>
                        <flux:table.cell>
                        </flux:table.cell>
                        <flux:table.cell class="flex items-center space-x-1">
                            <livewire:menus.edit :menu="$menu" />
                            @if ($menu->children->count() < 1)
                                <livewire:menus.delete :menu="$menu" />
                            @endif
                        </flux:table.cell>

                    </flux:table.row>
                    @foreach ($menu->children as $child)
                        <flux:table.row>
                            <flux:table.cell>

                            </flux:table.cell>
                            <flux:table.cell>
                                {{ $child->name }}
                            </flux:table.cell>
                            <flux:table.cell>
                                {{ $child->subdomain }}
                            </flux:table.cell>
                            <flux:table.cell>
                                <flux:icon name="{{ $child->icon }}" />
                                <span class="text-[10px]">
                                    {{ $child->icon }}
                                </span>
                            </flux:table.cell>
                            <flux:table.cell>
                                {{ $child->order }}
                            </flux:table.cell>
                            <flux:table.cell>
                                {{ $child->parent->name }}
                            </flux:table.cell>
                            <flux:table.cell class="flex items-center space-x-1">
                                <livewire:menus.edit :menu="$child" />
                                <livewire:menus.delete :menu="$child" />
                            </flux:table.cell>
                        </flux:table.row>
                    @endforeach
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
