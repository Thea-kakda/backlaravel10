@props(['href', 'active'])

<a href="{{ $href }}"
   class="flex items-center space-x-3 px-4 py-3 rounded-lg transition {{ $active ? 'bg-primary text-white' : 'text-gray-300 hover:bg-gray-700' }}">
  {{ $slot }}
</a>
