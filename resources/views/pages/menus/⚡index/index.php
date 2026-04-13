<?php

use App\Models\Menu;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {

    #[Computed]
    public function menus()
    {
        return Menu::orderBy('order', 'ASC')->where('parent_id', null)->paginate(10);
    }

    public function handleSort($id, $position)
    {
        // $task = $this->list->tasks()->findOrFail($id);
        $menu = Menu::find($id);
        $menu->order = $position;
        $menu->save();
        Flux::toast(variant: 'success', heading: "Terupdate", text: "berhasil mengubah order");
        $this->redirectRoute('menus.index', navigate: true);
        // Update the task's position and re-order other tasks...
    }
};
