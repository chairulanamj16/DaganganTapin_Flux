  <div class="flex space-x-2.5">
      <flux:select wire:model.live='limit_page' class="w-27.5">
          <flux:select.option>
              10
          </flux:select.option>
          <flux:select.option>
              25
          </flux:select.option>
          <flux:select.option>
              50
          </flux:select.option>
          <flux:select.option>
              100
          </flux:select.option>
      </flux:select>
      <div> </div>
      <flux:input icon="magnifying-glass" placeholder="Cari data..." wire:model.live='search' class="w-[100px]" />
  </div>
