<?php

use Livewire\Component;

new class extends Component {
    public $sidebar_menu, $additional_class;

    public function mount($sidebar_menu, $additional_class)
    {
        $this->sidebar_menu = $sidebar_menu;
        $this->additional_class = $additional_class;
    }

    public function getChildrenProperty()
    {
        return $this->sidebar_menu->children()->orderBy('order')->get();
    }

    public function getCanViewProperty()
    {
        if ($this->sidebar_menu->subdomain && $this->sidebar_menu->permission_view) {
            return auth()->user()->can($this->sidebar_menu->permission_view);
        }

        return true;
    }

    public function getIsCurrentProperty()
    {
        if (!$this->sidebar_menu->subdomain) {
            return false;
        }

        return request()->is($this->sidebar_menu->subdomain) || request()->routeIs($this->sidebar_menu->subdomain);
    }
};
?>

<div>
    @if ($this->canView)
        @if ($this->children->isNotEmpty())
            <flux:sidebar.group expandable :heading="$sidebar_menu->name" class="grid {{ $additional_class }}">
                @foreach ($this->children as $child)
                    <livewire:sidebar.item :sidebar_menu="$child" additional_class="ms-3" :key="'sidebar-' . $child->id" />
                @endforeach
            </flux:sidebar.group>
        @else
            <flux:sidebar.item :icon="$sidebar_menu->icon ?: 'circle-stack'"
                :href="$sidebar_menu->subdomain ? url($sidebar_menu->subdomain) : '#'" :current="$this->isCurrent"
                wire:navigate>
                {!! $sidebar_menu->name !!}
            </flux:sidebar.item>
        @endif
    @endif
</div>
