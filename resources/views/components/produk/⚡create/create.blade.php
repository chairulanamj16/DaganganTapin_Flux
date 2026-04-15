<div>
    <x-ui.modal-action name="add-produk" flyout>
        <form wire:submit.event='save'>
            <x-slot:trigger>
                <flux:button size="xs">
                    <i class="fas fa-plus fa-fw"></i>
                    Tambah Produk
                </flux:button>
            </x-slot:trigger>
            <div class="space-y-6">
                <flux:input label="Label" placeholder="Label" wire:model='form.title' />
                <div wire:ignore class="relative">
                    <label for="permissions">Kategori</label>
                    <div class="mt-1" />
                    <select id="category">
                        <option value=""></option>
                        @foreach ($this->categories as $category)
                            <option value="{{ $category->uuid }}">{{ $category->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <flux:textarea label="Deskripsi" placeholder="Deskripsi" wire:model='form.desc' />
                <flux:input label="Harga" placeholder="Harga" wire:model='form.price' type="number" />
                <flux:input label="Diskon" placeholder="Diskon" wire:model='form.discount' type="number" />
                <flux:input label="Stok" placeholder="Stok" wire:model='form.stock' type="number" />
                <flux:input label="Gambar" placeholder="Gambar" wire:model='form.gambar' type="file" />
                <flux:select label="Status" placeholder="Status" wire:model='form.status'>
                    <flux:select.option value="non_active">Tidak Aktif</flux:select.option>
                    <flux:select.option value="active">Aktif</flux:select.option>
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

    @push('js')
        <script>
            tomSelect();

            function tomSelect() {
                new TomSelect('#category', {
                    // plugins: ['remove_button'],
                    create: false,
                    allowEmptyOption: false,
                    maxItems: 1,
                    valueField: 'uuid',
                    labelField: 'Kategori',
                    searchField: 'Kategori',
                    placeholder: 'Pilih Kategori...',
                    onChange: (values) => {
                        console.log(values);
                        @this.set('form.category_id', values);
                    },
                });
            }
        </script>
    @endpush
</div>
