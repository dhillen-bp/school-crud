<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light" class="bg-tertiary-green">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>School Management</title>
    @livewireStyles
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- <link href="https://cdn.datatables.net/2.1.8/css/dataTables.tailwindcss.css" rel="stylesheet"> --}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-font-default min-h-screen antialiased">
    <div class="flex min-h-screen">
        <x-sidebar />

        <div class="flex flex-1 flex-col">
            <livewire:layout.navigation />

            <div class="p-4 sm:ml-64">
                <div class="d mt-14 p-4">
                    {{ $slot }}
                </div>
            </div>

            <x-toaster-hub />
        </div>
    </div>

    @livewireScripts
    <script src="{{ asset('js/simple-datatable.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script> --}}

    @stack('after-script')

</body>

</html>
