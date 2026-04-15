<?php

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public $selectDelete = [];
    #[Computed]
    public function products()
    {
        return Product::paginate(5);
    }

    public function deleteSelected()
    {
        $itemSelect = Product::whereIn('uuid', $this->selectDelete)->get();
        foreach ($itemSelect as $value) {
            $value->forceDelete();
        }
    }
};
