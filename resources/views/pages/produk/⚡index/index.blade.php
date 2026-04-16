<div>
    <div class="md:flex md:items-end md:justify-between">
        <div>
            <flux:heading size="xl">Produk Inventory</flux:heading>
            <flux:text size="xs">REAL-TIME STOCK MANAGEMENT ANALYTIC</flux:text>
        </div>
        <div class="flex space-x-2">
            @if (count($selectItem) >= 1)
                <div class="flex justify-start items-center space-x-1">
                    <flux:heading class="whitespace-nowrap">
                        <span>{{ count($selectItem) }}</span> Item Terpilih :
                    </flux:heading>
                    <flux:button size="xs" variant="danger" wire:click='deleteSelected'>
                        <i class="fas fa-trash fa-fw"></i>
                        Hapus yang Terpilih
                    </flux:button>
                </div>
            @endif
            <livewire:produk.create></livewire:produk.create>
        </div>
    </div>
    {{-- List Produk --}}
    <div class="mt-10 grid grid-cols-2 md:grid-cols-5 space-x-2">
        @forelse ($this->products as $product)
            <div class="bg-black/20 rounded-[10px]">
                <div class="relative">
                    <img src="{{ url('storage/' . $product->gambar) }}" class="w-100 h-40 md:h-55 rounded-t-[10px]"
                        alt="">
                    <flux:checkbox class="absolute top-2 left-2 z-10 bg-black" wire:model.live='selectItem'
                        :value="$product->uuid" />
                    <span
                        class="absolute top-2 right-2 text-[12px] bg-gray-900 rounded-[10px] px-2 border-[0.6] border-white">
                        {{ $product->category->kategori }}
                    </span>
                </div>
                <div class="p-3">
                    <h4 class="text-[16px]">
                        {{ $product->title }}
                    </h4>
                    <span class="text-yellow-500 font-bold text-[13px]">
                        Rp.{{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    <div class="mt-3"></div>
                    <flux:separator />
                    <div class="mt-3 flex justify-between items-center">
                        <flux:button size="xs">
                            <i class="fas fa-hashtag fa-fw"></i>
                            Stok :
                            {{ $product->stock }}
                        </flux:button>
                        <livewire:produk.edit :product="$product" />
                    </div>
                </div>
            </div>
        @empty

            <flux:card>
                Data Kosong
            </flux:card>
        @endforelse
    </div>
</div>
