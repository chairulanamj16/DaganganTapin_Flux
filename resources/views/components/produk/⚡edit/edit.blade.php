<div>
    <x-ui.modal-action name="edit-product-{{ $product->uuid }}" flyout>
        <form wire:submit.event='save'>
            <x-slot:trigger>
                <flux:button size="xs">
                    <i class="fas fa-edit fa-fw"></i>
                    Edit
                </flux:button>
            </x-slot:trigger>
            <div class="space-y-6">
                <flux:input label="Label" placeholder="Label" wire:model='form.title' />
                <div wire:ignore class="relative">
                    <label for="permissions">Kategori</label>
                    <div class="mt-1"></div>
                    <select id="category-{{ $product->id }}">
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
                <flux:input label="Gambar" placeholder="Gambar..." wire:model.live='form.gambar' type="file"
                    description:trailing="Abaikan jika tidak mau mengubah gambar." accept=".png,.jpg,.jpeg" />
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
        <script data-navigate-once>
            function initTomSelectEdit{{ $product->id }}() {
                const el = document.querySelector('#category-{{ $product->id }}');
                if (!el) return;

                if (el.tomselect) {
                    el.tomselect.destroy();
                }

                new TomSelect(el, {
                    create: false,
                    maxItems: 1,
                    valueField: 'value',
                    labelField: 'text',
                    searchField: 'text',
                    placeholder: 'Pilih permission...',
                    items: @js($product->category->uuid),
                    onChange: function(value) {
                        console.log(value);
                        @this.set('form.category_id', value);
                    },
                });

                el.tomselect.setValue(@js($product->category->uuid), true);

            }

            initTomSelectEdit{{ $product->id }}();
        </script>
    @endpush
</div>
