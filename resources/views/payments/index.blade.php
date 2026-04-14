@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Payment History
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                @if($payments->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">No payment records found.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2">Order</th>
                                    <th class="px-4 py-2">Amount</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Method</th>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-4 py-2">{{ $payment->order->rice_name }}</td>
                                        <td class="px-4 py-2 font-medium">₱{{ number_format($payment->amount, 2) }}</td>
                                        <td class="px-4 py-2">
                                            <span class="px-2 py-1 rounded text-sm {{ $payment->status == 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ ucfirst($payment->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2 capitalize">{{ $payment->payment_method }}</td>
                                        <td class="px-4 py-2">{{ $payment->payment_date ? $payment->payment_date->format('M d, Y') : 'N/A' }}</td>
                                        <td class="px-4 py-2 space-x-2">
                                            <a href="{{ route('payments.show', $payment) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                            <a href="{{ route('payments.edit', $payment) }}" class="text-green-600 hover:text-green-800">Edit</a>
                                            <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection