@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Rice Store Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main Actions Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Add Rice Stocks Card -->
                <div class="card">
                    <div class="flex items-center justify-center h-24 bg-blue-soft bg-opacity-20 rounded-lg mb-4">
                        <svg class="w-12 h-12" style="color: var(--blue-soft);" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM15 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2h-2zM5 13a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium mb-2">Add Rice Stocks</h3>
                    <p class="text-sm text-muted mb-4">Add new rice products or update existing stock quantities</p>
                    <div class="space-y-2">
                        <a href="{{ route('products.create') }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-center button-primary">
                            Add New Product
                        </a>
                        <a href="{{ route('products.index') }}" class="block w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-center">
                            View All Products
                        </a>
                    </div>
                </div>

                <!-- Create Order Card -->
                <div class="card">
                    <div class="flex items-center justify-center h-24 bg-green-soft bg-opacity-20 rounded-lg mb-4">
                        <svg class="w-12 h-12" style="color: var(--green-soft);" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1h7.586a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM5 16a2 2 0 11-4 0 2 2 0 014 0zm12 0a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium mb-2">Create Order</h3>
                    <p class="text-sm text-muted mb-4">Place new orders for rice products with automatic total calculation</p>
                    <div class="space-y-2">
                        <a href="{{ route('orders.create') }}" class="block w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-center button-primary">
                            Create New Order
                        </a>
                    </div>
                </div>

                <!-- Payments Card -->
                <div class="card">
                    <div class="flex items-center justify-center h-24 bg-purple-soft bg-opacity-20 rounded-lg mb-4">
                        <svg class="w-12 h-12" style="color: var(--purple-soft);" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium mb-2">Process Payments</h3>
                    <p class="text-sm text-muted mb-4">Handle payments (Cash/Card) and view payment history</p>
                    <div class="space-y-2">
                        <a href="{{ route('orders.index') }}?action=payment" class="block w-full bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded text-center button-primary">
                            Make Payment
                        </a>
                        <a href="{{ route('payments.index') }}" class="block w-full bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded text-center">
                            Payment History
                        </a>
                    </div>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Products -->
                <div class="card text-center">
                    <div class="text-4xl font-bold mb-2" style="color: var(--blue-soft);">{{ $totalProducts ?? 0 }}</div>
                    <div class="text-gray-400">Total Rice Products</div>
                </div>

                <!-- Total Orders -->
                <div class="card text-center">
                    <div class="text-4xl font-bold mb-2" style="color: var(--green-soft);">{{ $totalOrders ?? 0 }}</div>
                    <div class="text-gray-400">Total Orders</div>
                </div>

                <!-- Total Payments -->
                <div class="card text-center">
                    <div class="text-4xl font-bold mb-2" style="color: var(--purple-soft);">₱{{ number_format($totalPayments ?? 0, 2) }}</div>
                    <div class="text-gray-400">Total Payment (Paid)</div>
                </div>
            </div>
        </div>
    </div>
@endsection
