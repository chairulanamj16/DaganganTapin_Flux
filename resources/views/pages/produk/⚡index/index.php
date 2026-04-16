<?php

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public $selectItem = [];
    #[Computed]
    public function products()
    {
        return Product::paginate(10);
    }

    public function deleteSelected()
    {
        $itemSelect = Product::whereIn('uuid', $this->selectItem)->get();
        foreach ($itemSelect as $value) {
            $value->forceDelete();
        }
    }
};
