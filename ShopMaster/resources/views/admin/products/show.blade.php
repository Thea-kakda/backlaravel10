@extends('layouts.admin')

@section('title', 'Product Details')
@section('page-title', 'Product Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-gray-800 rounded-xl p-6">
        <div class="flex justify-between items-start mb-6">
            <h2 class="text-2xl font-bold">{{ $product->name }}</h2>
            <a href="{{ route('admin.products.edit', $product) }}"
               class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-indigo-600 text-sm">
                Edit Product
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Image -->
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Product Image</label>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                         class="w-full h-64 object-cover rounded-lg">
                @else
                    <div class="bg-gray-700 border-2 border-dashed border-gray-600 rounded-lg w-full h-64 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
            </div>

            <!-- Details -->
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-400">Name</label>
                    <p class="text-lg text-white">{{ $product->name }}</p>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-400">Description</label>
                    <p class="text-white">{{ $product->description ?: '—' }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-medium text-gray-400">Price</label>
                        <p class="text-xl font-bold text-success">${{ number_format($product->price, 2) }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-400">Stock</label>
                        <p class="text-xl font-bold text-white">{{ $product->stock }}</p>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-400">Category</label>
                    <p class="text-white">
                        <span class="px-3 py-1 bg-primary/20 text-primary rounded-full text-sm">
                            {{ $product->category->name }}
                        </span>
                    </p>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-400">Created At</label>
                    <p class="text-gray-400 text-sm">{{ $product->created_at->format('M d, Y \a\t h:i A') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <a href="{{ route('admin.products.index') }}"
               class="px-5 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition">
                Back to Products
            </a>
        </div>
    </div>
</div>
@endsection
