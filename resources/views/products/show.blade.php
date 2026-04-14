@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $product->rice_name }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="card">
            <h1>{{ $product->rice_name }}</h1>
            <div class="space-y-4">
                <div>
                    <p class="text-muted">Price per Kilogram</p>
                    <p class="text-lg font-medium">₱{{ number_format($product->price_per_kilo, 2) }}/kg</p>
                </div>
                <div>
                    <p class="text-muted">Stock Quantity</p>
                    <p class="text-lg font-medium">{{ $product->stock_per_kilo }} kg</p>
                </div>
                <div>
                    <p class="text-muted">Description</p>
                    <p class="text-lg">{{ $product->description ?? 'No description' }}</p>
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <a href="{{ route('products.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">Back</a>
                <a href="{{ route('products.edit', $product) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection