<div class="grid grid-cols-2 md:grid-cols-8 space-x-2 space-y-2">
    @foreach ($this->products as $product)
        <div class="bg-white rounded-2xl">
            <img src="{{ url('storage/' . $product->gambar) }}" alt="{{ $product->title }}"
                class="rounded-t-2xl w-100 h-37.5">
            <div class="p-3 flex-col justify-between items-center">
                <h4 class="text-gray-700 text-[12px] font-bold mb-2">
                    {{ $product->title }}
                </h4>
                <span class="text-orange-950">
                    Rp. {{ number_format($product->price, 0, ',', '.') }}
                </span>
                <div class="text-gray-700 text-[12px] mt-1">
                    <i class="fas fa-location-dot fa-fw"></i>
                    Kab.Tapin
                </div>
                <div class="text-gray-700 text-[12px] flex space-x-1 mt-1">
                    <div>
                        <i class="fas fa-star fa-fw text-yellow-400"></i>
                        4.9
                    </div>
                    <div>|</div>
                    <div>
                        Terjual 100+
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
