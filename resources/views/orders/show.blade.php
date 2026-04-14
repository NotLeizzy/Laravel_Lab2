@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">{{ $order->rice_name }}</h1>
    <p>Quantity: {{ $order->quantity }}</p>
    <p>Price per Kilo: ₱{{ number_format($order->price_per_kilo, 2) }}</p>
    <p>Total: ₱{{ number_format($order->total_amount, 2) }}</p>
    <p>Product: {{ $order->product ? $order->product->rice_name : 'N/A' }}</p>
    <h3>Payments:</h3>
    @if($order->payments->isNotEmpty())
        @foreach($order->payments as $payment)
            <p>Amount: ${{ $payment->amount }} - Status: {{ $payment->status }} - Date: {{ $payment->payment_date }}</p>
        @endforeach
    @else
        <p>No payments yet.</p>
    @endif
    @if($order->payments->isEmpty() || $order->payments->last()->status == 'unpaid')
        <a href="{{ route('payments.create', ['order_id' => $order->id]) }}">Process Payment</a>
    @endif
    <a href="{{ route('orders.index') }}">Back</a>
</div>
@endsection