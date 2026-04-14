@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Edit Payment Status
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="mb-6 p-4 bg-gray-100 dark:bg-gray-700 rounded">
                    <p><strong>Amount:</strong> ₱{{ number_format($payment->amount, 2) }}</p>
                    <p><strong>Current Status:</strong> <span class="text-{{ $payment->status == 'paid' ? 'green' : 'red' }}-600">{{ ucfirst($payment->status) }}</span></p>
                    <p><strong>Payment Date:</strong> {{ $payment->payment_date ? $payment->payment_date->format('M d, Y h:i A') : 'N/A' }}</p>
                    <p><strong>Payment Method:</strong> {{ ucfirst($payment->payment_method) }}</p>
                </div>

                <form action="{{ route('payments.update', $payment) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Update Status</label>
                        <select name="status" required class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 dark:bg-gray-700">
                            <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="unpaid" {{ $payment->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium">
                            Update Status
                        </button>
                        <a href="{{ route('payments.index') }}" class="flex-1 bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded text-center font-medium">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection