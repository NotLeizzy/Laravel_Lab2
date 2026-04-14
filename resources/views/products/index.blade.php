@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        All Products
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('products.create') }}" class="btn-primary bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">+ Add Product</a>
        </div>
        <div class="grid grid-cols-1 gap-6">
            @foreach($products as $product)
                <div class="card">
                    <h2>{{ $product->rice_name }}</h2>
                    <p>Price: ₱{{ number_format($product->price_per_kilo, 2) }}/kg</p>
                    <p>Stock: {{ $product->stock_per_kilo }} kg</p>
                    <p>{{ $product->description }}</p>
                    <div class="flex gap-4 mt-4">
                        <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:text-blue-800">View</a>
                        <a href="{{ route('products.edit', $product) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection