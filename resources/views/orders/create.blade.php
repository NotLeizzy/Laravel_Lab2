@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Create New Order
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="card">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Create New Order</h3>
                <a href="{{ route('orders.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">View Orders</a>
            </div>
            
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Select Rice Product</label>
                    <select name="products_id" id="product_select" required class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 dark:bg-gray-700">
                        <option value="">Select Available Rice</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-name="{{ $product->rice_name }}" data-price="{{ $product->price_per_kilo }}">
                                {{ $product->rice_name }} - ₱{{ number_format($product->price_per_kilo, 2) }}/kg (Stock: {{ $product->stock_per_kilo }}kg)
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Rice Name</label>
                    <input type="text" id="rice_name" name="rice_name" required class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 dark:bg-gray-700" readonly>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Price per Kilo (₱)</label>
                    <input type="number" step="0.01" id="price_per_kilo" name="price_per_kilo" required class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 dark:bg-gray-700" readonly>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Quantity (kg)</label>
                    <input type="number" id="quantity" name="quantity" required class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 dark:bg-gray-700" min="0.1" step="0.1">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Total Amount (₱)</label>
                    <input type="number" step="0.01" id="total_amount" name="total_amount" required class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 dark:bg-gray-700" readonly>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium">Create Order</button>
                    <a href="{{ route('orders.index') }}" class="flex-1 bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded text-center font-medium">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('product_select').addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const riceName = selectedOption.getAttribute('data-name');
    const price = selectedOption.getAttribute('data-price');

    document.getElementById('rice_name').value = riceName || '';
    document.getElementById('price_per_kilo').value = price || '';
    calculateTotal();
});

document.getElementById('quantity').addEventListener('input', calculateTotal);

function calculateTotal() {
    const price = parseFloat(document.getElementById('price_per_kilo').value) || 0;
    const quantity = parseFloat(document.getElementById('quantity').value) || 0;
    const total = price * quantity;
    document.getElementById('total_amount').value = total.toFixed(2);
}
</script>
@endsection