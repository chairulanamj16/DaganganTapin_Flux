<div>
    <div class="grid grid-cols-4 md:grid-cols-10 md:justify-center md:items-center  space-x-2">
        @foreach ($this->categories as $category)
            <div class="flex flex-col justify-center items-center md:bg-white py-3 rounded-2xl">
                <img src="{{ url('storage/' . $category->logo) }}" width="56" height="56"
                    alt="{{ $category->kategori }}">
                <span class="text-[12px] text-gray-700 mt-3">
                    {{ $category->kategori }}
                </span>
            </div>
        @endforeach
    </div>
</div>
