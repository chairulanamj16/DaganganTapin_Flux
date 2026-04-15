<div>
    <div class="md:flex md:items-end md:justify-between">
        <div>
            <flux:heading size="xl">Produk Inventory</flux:heading>
            <flux:text size="xs">REAL-TIME STOCK MANAGEMENT ANALYTIC</flux:text>
        </div>
        <div class="flex space-x-2">
            @if (count($selectDelete) >= 1)
                <div class="flex justify-start items-center space-x-1">
                    <flux:heading class="whitespace-nowrap">
                        <span>{{ count($selectDelete) }}</span> Selected :
                    </flux:heading>
                    <flux:button size="xs" variant="danger" wire:click='deleteSelected'>
                        <i class="fas fa-trash fa-fw"></i>
                        Delete Selected
                    </flux:button>
                </div>
            @endif
            <livewire:produk.create></livewire:produk.create>
        </div>
    </div>
    {{-- List Produk --}}
    <div class="mt-10 grid grid-cols-5 space-x-2">
        @forelse ($this->products as $product)
            <div class="bg-black/20 rounded-[10px]">
                <div class="relative">
                    <img src="{{ url('storage/' . $product->gambar) }}" class="w-100 h-55 rounded-t-[10px]"
                        alt="">
                    <flux:checkbox class="absolute top-2 left-2 z-10 bg-black border border-black"
                        wire:model.live='selectDelete' :value="$product->uuid" />
                </div>
                <div class="p-2">
                    <h4 class="text-[20px]">
                        {{ $product->title }}
                    </h4>
                    <span>
                        Rp.{{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>
            </div>
        @empty

            <flux:card>
                Data Kosong
            </flux:card>
        @endforelse
    </div>
</div>
