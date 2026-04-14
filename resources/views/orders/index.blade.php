@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        All Orders
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('orders.create') }}" class="btn-primary bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">+ Create Order</a>
        </div>
        <div class="grid grid-cols-1 gap-6">
            @forelse($orders as $order)
                <div class="card">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-bold">Order #{{ $order->id }}</h3>
                            <p class="text-sm text-muted">{{ $order->created_at->format('M d, Y \a\t h:i A') }}</p>
                        </div>
                        <p class="text-lg font-bold">
                            @if($order->payments->isNotEmpty() && $order->payments->last()->status == 'paid')
                                <span class="badge-paid">Paid</span>
                            @else
                                <span class="badge-unpaid">Unpaid</span>
                            @endif
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-muted text-sm">Rice Type</p>
                            <p class="font-medium">{{ $order->rice_name }}</p>
                        </div>
                        <div>
                            <p class="text-muted text-sm">Quantity</p>
                            <p class="font-medium">{{ $order->quantity }} kg</p>
                        </div>
                        <div>
                            <p class="text-muted text-sm">Price per kg</p>
                            <p class="font-medium">₱{{ number_format($order->price_per_kilo, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-muted text-sm">Total Amount</p>
                            <p class="font-bold text-lg text-green-600">₱{{ number_format($order->total_amount, 2) }}</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-2 flex-wrap">
                        @if($order->payments->isEmpty() || $order->payments->last()->status == 'unpaid')
                            <a href="{{ route('payments.create', ['order_id' => $order->id]) }}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded text-sm">Pay Now</a>
                        @endif
                        <a href="{{ route('orders.show', $order) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded text-sm">View Details</a>
                        <a href="{{ route('orders.edit', $order) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-2 rounded text-sm">Edit</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="card">
                    <p class="text-muted text-center py-8">No orders yet. <a href="{{ route('orders.create') }}" class="text-blue-600 hover:text-blue-800 font-medium">Create your first order</a></p>
                </div>
            @endforelse
        </div>
        </div>
    </div>
</div>
@endsection