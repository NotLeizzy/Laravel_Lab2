@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Edit Order
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="mb-4">
        <label>Select Rice Product</label>
        <select name="products_id" id="product_select" required class="border px-2 py-1">
            <option value="">Select Available Rice</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ $order->products_id == $product->id ? 'selected' : '' }} data-name="{{ $product->rice_name }}" data-price="{{ $product->price_per_kilo }}">
                    {{ $product->rice_name }} - ₱{{ number_format($product->price_per_kilo, 2) }}/kg (Stock: {{ $product->stock_per_kilo }}kg)
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label>Rice Name</label>
        <input type="text" id="rice_name" name="rice_name" value="{{ $order->rice_name }}" required class="border px-2 py-1" readonly>
    </div>
    <div class="mb-4">
        <label>Price per Kilo (₱)</label>
        <input type="number" step="0.01" id="price_per_kilo" name="price_per_kilo" value="{{ $order->price_per_kilo }}" required class="border px-2 py-1" readonly>
    </div>
    <div class="mb-4">
        <label>Quantity (kg)</label>
        <input type="number" id="quantity" name="quantity" value="{{ $order->quantity }}" required class="border px-2 py-1" min="0.1" step="0.1">
    </div>
    <div class="mb-4">
        <label>Total Amount (₱)</label>
        <input type="number" step="0.01" id="total_amount" name="total_amount" value="{{ $order->total_amount }}" required class="border px-2 py-1" readonly>
    </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Order</button>
    </form>
            </div>
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

// Initialize total on page load
calculateTotal();
</script>
@endsection