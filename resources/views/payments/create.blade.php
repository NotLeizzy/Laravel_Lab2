@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Process Payment
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="card">
            <h3 class="text-lg font-medium mb-4">Order Details</h3>
            <div class="mb-6 p-4 bg-gray-100 dark:bg-gray-700 rounded">
                <p><strong>Rice:</strong> {{ $order->rice_name }}</p>
                <p><strong>Quantity:</strong> {{ $order->quantity }} kg</p>
                <p><strong>Price per kg:</strong> ₱{{ number_format($order->price_per_kilo, 2) }}</p>
                <p class="text-lg"><strong>Total Amount:</strong> <span class="text-green-600 dark:text-green-400">₱{{ number_format($order->total_amount, 2) }}</span></p>
            </div>

            <form action="{{ route('payments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Amount (₱)</label>
                    <input type="number" step="0.01" name="amount" value="{{ $order->total_amount }}" required class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 dark:bg-gray-700">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Payment Method</label>
                    <select name="payment_method" required class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 dark:bg-gray-700">
                        <option value="">Select Payment Method</option>
                        <option value="cash">Cash</option>
                        <option value="card">Credit/Debit Card</option>
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium">
                        Process Payment
                    </button>
                    <a href="{{ route('orders.index') }}" class="flex-1 bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded text-center font-medium">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection