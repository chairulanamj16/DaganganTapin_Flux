<?php

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function categories()
    {
        return Category::orderBy('kategori', 'ASC')->get();
    }
};
