<?php

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public $search, $limit_page = 10;

    #[Computed]
    public function categories()
    {
        return Category::orderBy('id', 'DESC')->withTrashed()->paginate($this->limit_page);
    }
};
