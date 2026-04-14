@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card mb-8">
                <h2 class="text-2xl mb-4">Welcome to Rice Store Management System!</h2>
                <p class="text-muted mb-6">Manage your rice inventory, process orders, and handle payments all in one place.</p>
                <a href="{{ route('actions') }}" class="btn-primary bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">Go to Actions Menu</a>
            </div>

            <!-- Quick Access to Products -->
            <h3 class="text-xl font-bold mb-4">Available Rice Products</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($products ?? [] as $product)
                    <div class="card">
                        <h4 class="text-lg font-medium mb-2">{{ $product->rice_name }}</h4>
                        <div class="space-y-2">
                            <p><span class="text-muted">Price:</span> <strong>₱{{ number_format($product->price_per_kilo, 2) }}/kg</strong></p>
                            <p><span class="text-muted">Stock:</span> <strong>{{ $product->stock_per_kilo }} kg</strong></p>
                            <p class="text-sm text-muted">{{ $product->description ?? 'No description' }}</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <a href="{{ route('orders.create') }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded text-center text-sm">Order Now</a>
                            <a href="{{ route('products.show', $product) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded text-center text-sm">View Details</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full card">
                        <p class="text-muted text-center">No products available yet. <a href="{{ route('products.create') }}" class="text-blue-600 hover:text-blue-800">Add one now</a></p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
