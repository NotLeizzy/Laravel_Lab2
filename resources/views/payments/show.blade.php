@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Payment Details
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="space-y-4">
                    <div class="pb-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">Order</h3>
                        <p class="text-lg font-medium">{{ $payment->order->rice_name }}</p>
                    </div>
                    <div class="pb-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">Amount</h3>
                        <p class="text-lg font-medium">₱{{ number_format($payment->amount, 2) }}</p>
                    </div>
                    <div class="pb-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">Status</h3>
                        <p>
                            <span class="px-3 py-1 rounded text-sm font-medium {{ $payment->status == 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </p>
                    </div>
                    <div class="pb-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">Payment Method</h3>
                        <p class="text-lg font-medium capitalize">{{ $payment->payment_method }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm text-gray-600 dark:text-gray-400">Payment Date</h3>
                        <p class="text-lg font-medium">{{ $payment->payment_date ? $payment->payment_date->format('F d, Y h:i A') : 'N/A' }}</p>
                    </div>
                </div>
                <div class="mt-6 flex gap-2">
                    <a href="{{ route('payments.edit', $payment) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium">
                        Edit Status
                    </a>
                    <a href="{{ route('payments.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded font-medium">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection