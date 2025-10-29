@extends('layouts.admin')
@section('title', 'Products')
@section('page-title', 'Products')

@section('content')
<div class="flex justify-between mb-6">
    <h3 class="text-xl font-semibold">All Products</h3>
    <a href="{{ route('admin.products.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-indigo-600">
        Add Product
    </a>
</div>

<div class="bg-gray-800 rounded-xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-700">
            <tr>
                <th class="text-left p-4">Image</th>
                <th class="text-left p-4">Name</th>
                <th class="text-left p-4">Category</th>
                <th class="text-left p-4">Price</th>
                <th class="text-left p-4">Stock</th>
                <th class="text-left p-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-b border-gray-700">
                <td class="p-4">
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/50' }}"
                         class="w-12 h-12 rounded-lg object-cover">
                </td>
                <td class="p-4">{{ $product->name }}</td>
                <td class="p-4 text-gray-400">{{ $product->category->name }}</td>
                <td class="p-4">${{ number_format($product->price, 2) }}</td>
                <td class="p-4">{{ $product->stock }}</td>
                <td class="p-4 space-x-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="text-warning hover:underline">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete?')" class="text-danger hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4">{{ $products->links() }}</div>
</div>
@endsection
