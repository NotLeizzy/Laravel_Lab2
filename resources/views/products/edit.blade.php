@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Edit Rice Product
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label>Rice Name</label>
            <input type="text" name="rice_name" value="{{ $product->rice_name }}" required class="border px-2 py-1">
        </div>
        <div class="mb-4">
            <label>Price per Kilo (₱)</label>
            <input type="number" step="0.01" name="price_per_kilo" value="{{ $product->price_per_kilo }}" required class="border px-2 py-1">
        </div>
        <div class="mb-4">
            <label>Stock per Kilo</label>
            <input type="number" step="0.01" name="stock_per_kilo" value="{{ $product->stock_per_kilo }}" required class="border px-2 py-1">
        </div>
        <div class="mb-4">
            <label>Description</label>
            <textarea name="description" class="border px-2 py-1">{{ $product->description }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
            </div>
        </div>
    </div>
</div>
@endsection