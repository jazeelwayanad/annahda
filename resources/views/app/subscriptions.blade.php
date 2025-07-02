<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Subscriptions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-xl font-bold text-black">Current Subscriptions</h1>

                {{-- list --}}
                <div class="w-full mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($subscriptions as $subscription)
                        <div class="p-4 rounded-lg shadow-md border border-gray-100">
                            <h2 class="text-lg font-semibold text-primary-600">{{ $subscription->plan->name }}</h2>

                            <p class="mt-4 text-gray-600">Status: {{ $subscription->status }}</p>
                            <p class="text-gray-600">Start Date: {{ $subscription?->start_date?->format('Y-m-d') }}</p>
                            <p class="text-gray-600">End Date: {{ $subscription->end_date ? $subscription->end_date->format('Y-m-d') : 'N/A' }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">You have no active subscriptions</p>
                    @endforelse
                </div>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-xl font-bold text-black">Billing History</h1>

                {{-- list --}}
                <div class="w-full mt-6 relative overflow-x-auto border border-gray-200">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Plan name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Payment Method
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Payment Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Plan End Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices as $invoice)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $invoice->plan->name }}
                                </th>
                                <td class="px-6 py-4">
                                    ₹{{ $invoice->total }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $invoice->method }}
                                </td>
                                <td class="px-6 py-4">
                                    {{  $invoice->issue_date->format('d-m-Y') }}
                                </td>
                                 <td class="px-6 py-4">
                                    {{  $invoice->subscription->expiry_date->format('d-m-Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('app.subscriptions.invoice', $invoice->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Download Invoice</a>
                                </td>
                            </tr>
                            @empty
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                <th scope="row" colspan="6" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    No billing history available
                                </th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
