<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopMaster - @yield('title')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 border-r border-gray-700 flex flex-col">
    <div class="p-5 border-b border-gray-700">
      <h1 class="text-2xl font-bold text-primary">ShopMaster</h1>
    </div>
    <nav class="flex-1 p-4 space-y-2">
      <x-sidebar-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
        <x-icon name="dashboard" /> Dashboard
      </x-sidebar-link>
      <x-sidebar-link href="{{ route('admin.products.index') }}" :active="request()->routeIs('admin.products.*')">
        <x-icon name="package" /> Products
      </x-sidebar-link>
      <x-sidebar-link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.*')">
        <x-icon name="folder" /> Categories
      </x-sidebar-link>
      <x-sidebar-link href="{{ route('admin.orders') }}">
        <x-icon name="shopping-cart" /> Orders
      </x-sidebar-link>
    </nav>
    <div class="p-4 border-t border-gray-700">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="w-full text-left flex items-center space-x-2 text-red-400 hover:text-red-300">
          <x-icon name="logout" /> <span>Logout</span>
        </button>
      </form>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6">
    <header class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-semibold">@yield('page-title')</h2>
      <div class="flex items-center space-x-3">
        <span class="text-sm">Mori Ray</span>
        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold">
          MR
        </div>
      </div>
    </header>

    @yield('content')
  </main>
</body>
</html>
