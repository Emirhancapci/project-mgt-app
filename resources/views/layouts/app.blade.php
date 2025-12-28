<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Proje Yönetimi')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-gray-50">
    
    <!-- Navbar (opsiyonel) -->
    <nav class="bg-white shadow-sm mb-6">
        <div class="container mx-auto px-4 py-4">
            <h1 class="text-2xl font-bold text-gray-900">Proje Yönetim Sistemi</h1>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>