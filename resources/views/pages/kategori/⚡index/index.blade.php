<div>
    <flux:card>
        <livewire:kategori.create />
        <div class="mt-5" />
        <x-ui.filter-data />
        <div class="mt-5" />
        <flux:table :paginate="$this->categories">
            <flux:table.columns>
                <flux:table.column align="center">NO</flux:table.column>
                <flux:table.column>
                    Kategori
                </flux:table.column>
                <flux:table.column>
                    Slug
                </flux:table.column>
                <flux:table.column align='center'>
                    Logo
                </flux:table.column>
                <flux:table.column align="center">
                    <i class="fas fa-cog fa-fw"></i>
                </flux:table.column>
            </flux:table.columns>
            <flux:table.rows>
                @forelse ($this->categories as $category)
                    <flux:table.row>
                        <flux:table.cell class="text-center">{{ $loop->iteration }}</flux:table.cell>
                        <flux:table.cell>{{ $category->kategori }}</flux:table.cell>
                        <flux:table.cell>{{ $category->slug }}</flux:table.cell>
                        <flux:table.cell class="text-center">
                            <img src="{{ url('storage/' . $category->logo) }}" alt="{{ $category->kategori }}"
                                width="50px" class="mx-auto">
                        </flux:table.cell>
                        <flux:table.cell class="flex items-center justify-center space-x-1">
                            <livewire:kategori.edit :category="$category" />
                            <livewire:kategori.delete :category="$category" />
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                @endforelse
            </flux:table.rows>
        </flux:table>
    </flux:card>
</div>
