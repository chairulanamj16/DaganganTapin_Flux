<div>
    <div
        class="bg-white/50 backdrop-blur-md py-3.5 px-4 flex space-x-3 justify-center items-center fixed z-99 top-0 left-0 right-0">
        <a href="" class="bg-white  block text-gray-600 text-[14px] py-2.25 px-4 rounded-xl w-100">
            <i class="fas fa-search fa-fw"></i>
            Cari produk...
        </a>
        <x-ui.modal-action name="open-chart" flyout>
            <x-slot:trigger>
                <button>
                    <i class="fas fa-cart-shopping fa-fw text-gray-700"></i>
                </button>
            </x-slot:trigger>
        </x-ui.modal-action>
        <x-ui.modal-action name="open-notif" flyout>
            <x-slot:trigger>
                <button>
                    <i class="fas fa-bell fa-fw text-gray-700"></i>
                </button>
            </x-slot:trigger>
        </x-ui.modal-action>
    </div>
</div>
