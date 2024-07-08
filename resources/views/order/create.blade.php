<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('orders.store') }}" method="POST" id="orderForm">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <div class="mb-6">
                    <label for="pizza_size" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pizza Size</label>
                    <select name="pizza_size_id" id="pizza_size" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach($pizza_sizes as $size)
                            <option value="{{ $size->id }}" data-price="{{ $size->price }}">{{ $size->name }} - RM{{ number_format($size->price, 2) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Toppings</label>
                    @foreach($toppings as $topping)
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="toppings[]" value="{{ $topping->id }}" id="topping_{{ $topping->id }}" class="topping-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600" data-price="{{ $topping->price }}">
                            <label for="topping_{{ $topping->id }}" class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $topping->name }} - +RM{{ number_format($topping->price, 2) }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-6">
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">Total Price: RM<span id="totalPrice">0.00</span></p>
                </div>

                <input type="hidden" name="total_price" id="totalPriceInput">

                <div class="mt-6">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                        Place Order
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('footer')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('orderForm');
                const pizzaSizeSelect = document.getElementById('pizza_size');
                const toppingCheckboxes = document.querySelectorAll('.topping-checkbox');
                const totalPriceSpan = document.getElementById('totalPrice');
                const totalPriceInput = document.getElementById('totalPriceInput');

                function calculateTotalPrice() {
                    let total = parseFloat(pizzaSizeSelect.options[pizzaSizeSelect.selectedIndex].dataset.price);

                    toppingCheckboxes.forEach(checkbox => {
                        if (checkbox.checked) {
                            total += parseFloat(checkbox.dataset.price);
                        }
                    });

                    return total.toFixed(2);
                }

                function updateTotalPrice() {
                    const totalPrice = calculateTotalPrice();
                    totalPriceSpan.textContent = totalPrice;
                    totalPriceInput.value = totalPrice;
                }

                pizzaSizeSelect.addEventListener('change', updateTotalPrice);
                toppingCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', updateTotalPrice);
                });

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    updateTotalPrice();

                    setTimeout(() => {
                        form.submit();
                    }, 0);
                });

                updateTotalPrice();
            });
        </script>
    @endpush
</x-app-layout>
