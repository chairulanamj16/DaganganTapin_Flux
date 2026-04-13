<?php

use App\Concerns\Toastable;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

new class extends Component
{
    use Toastable;
    use WithPagination;
    public $search, $limit_page = 10;
    public $sortBy, $sortDirection;

    public $name;

    #[Computed]
    public function permissions()
    {
        return Permission::select(['id', 'name'])
            ->where('name', 'like', '%' . $this->search . '%')
            ->when($this->sortBy, fn($q) => $q->orderBy($this->sortBy, $this->sortDirection))
            ->paginate($this->limit_page);
    }
    public function sort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }


    public function destroy($id)
    {
        Permission::find($id)->delete();
        Flux::toast(variant: 'success', heading: "Terhapus", text: "berhasil menghapus data");
        $this->redirectRoute('permissions.index', navigate: true);
    }
};
