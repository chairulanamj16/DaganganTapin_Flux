<div>
    <flux:card>
        <livewire:roles.create />
        <div class="mt-5" />
        <x-ui.filter-data></x-ui.filter-data>
        <div class="mt-2" />
        <flux:table :paginate="$this->roles">
            <flux:table.columns>
                <flux:table.column align="center">
                    No
                </flux:table.column>
                <flux:table.column>
                    Nama
                </flux:table.column>
                <flux:table.column>
                    Permission
                </flux:table.column>
                <flux:table.column align="center">
                    <i class="fas fa-edit fa-fw"></i>
                </flux:table.column>
            </flux:table.columns>
            @foreach ($this->roles as $role)
                <flux:table.columns>
                    <flux:table.cell class="text-center">{{ $loop->iteration }}</flux:table.cell>
                    <flux:table.cell>{{ $role->name }}</flux:table.cell>
                    <flux:table.cell>
                        <div class="whitespace-normal wrap-break-word max-w-200">
                            @foreach ($role->permissions as $it)
                                <span class="bg-blue-400 mr-1 rounded text-[10px] px-5 py-1 mb-1 inline-block">
                                    {{ $it->name }}
                                </span>
                            @endforeach
                        </div>
                    </flux:table.cell>
                    <flux:table.cell class="flex items-center space-x-1">
                        <livewire:roles.edit :role="$role" />
                        <livewire:roles.delete :role="$role" />


                    </flux:table.cell>
                </flux:table.columns>
            @endforeach
        </flux:table>
    </flux:card>
</div>
