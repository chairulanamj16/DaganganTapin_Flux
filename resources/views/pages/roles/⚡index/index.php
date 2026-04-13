<?php

use Livewire\Attributes\Computed;
use Livewire\Component;
use Spatie\Permission\Models\Role;

new class extends Component
{
    public $search, $limit_page = 10;
    #[Computed()]
    public function roles()
    {
        return Role::where('name', 'LIKE', '%' . $this->search . '%')->paginate($this->limit_page);
    }
};
