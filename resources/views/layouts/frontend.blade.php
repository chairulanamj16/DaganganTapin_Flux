<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
    @stack('css')
</head>

<body class="min-h-screen bg-[#E0E3E5]">



    {{ $slot }}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"
        integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.5.2/dist/js/tom-select.complete.min.js"></script>
    <script>
        toastr.options = {
            "positionClass": "toast-top-right",
            "timeOut": "3000",
            "progressBar": true,
            "closeButton": true
        };

        // Debug: cek event data
        window.addEventListener('livewire:init', () => {
            Livewire.on('show-toast', (event) => {
                console.log(event);
                const type = event[0].type || 'info';
                const message = event[0].message || 'No message';

                if (type === 'success') toastr.success(message);
                else if (type === 'error') toastr.error(message);
                else if (type === 'warning') toastr.warning(message);
                else toastr.info(message);
            });
        });
    </script>

    @if (session()->has('toast'))
        <script>
            // pakai langsung, atau pakai var
            var toastData = @json(session('toast'));
            var type = toastData.type || 'info';
            var message = toastData.message || 'No message';

            if (type === 'success') toastr.success(message);
            else if (type === 'error') toastr.error(message);
            else if (type === 'warning') toastr.warning(message);
            else toastr.info(message);
        </script>
    @endif
    @persist('toast')
        <flux:toast.group>
            <flux:toast />
        </flux:toast.group>
    @endpersist
    @fluxScripts
    @livewireScripts
    <script>
        document.addEventListener('livewire:load', () => {
            console.log('Livewire loaded');
        });

        document.addEventListener('livewire:update', () => {
            console.log('Livewire updated');
        });
    </script>
    @stack('js')

</body>

</html>
