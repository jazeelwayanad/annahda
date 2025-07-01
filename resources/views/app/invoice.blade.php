<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body class="w-full bg-white text-black py-8 px-6">
    <main class="w-full max-w-[800px] mx-auto bg-white p-8 print:p-0">
        <!-- header -->
        <div class="w-full grid grid-cols-2 gap-6">
            <div class="w-full">
                <img src="{{ asset('assets/annahda-logo.svg') }}" alt="Humblar Logo" class="h-14">
            </div>
            <div class="w-full flex justify-end">
                <div class="w-full max-w-xs">
                    <h1 class="text-6xl font-semibold text-black text-right tracking-wider">Invoice</h1>

                    <div class="w-full mt-1 relative overflow-x-auto max-w-60 ml-auto">
                        <table class="w-full text-sm text-left">
                            <tr class="bg-white">
                                <th scope="row" class="text-gray-900 font-bold whitespace-nowrap">
                                    Invoice No.
                                </th>
                                <td class="text-right">
                                    #{{ $invoice->invoice_number }}
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <th scope="row" class="text-gray-900 font-bold whitespace-nowrap">
                                    Quotation Date
                                </th>
                                <td class="text-right">
                                    {{ $invoice->issue_date->format('d M, Y') }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- billing details -->
        <div class="w-full mt-10">
            <div class="w-full grid grid-cols-2 gap-6">
                <!-- Billed To -->
                <div class="w-full flex justify-start">
                    <div class="w-full max-w-xs">
                        <h2 class="text-sm text-black font-medium">Billed By:</h2>
                        <h3 class="mt-1 text-lg font-bold capitalize text-primary-600">annahda Arabic</h3>
                        <p class="text-sm text-gray-700">Vadhee Hidaya, Vattaparamba, Parappur,<br> Kottakkal, Malappuram, India, PIN: 676503</p>
                        <p class="mt-2 text-sm text-gray-700"><b class="text-black">Phone:</b> +91 96459 60847</p>
                        <p class="text-sm text-gray-700"><b class="text-black">Email:</b> info@annahda.in</p>
                    </div>
                </div>
                <div class="w-full flex justify-end">
                    <div class="w-full max-w-xs text-right">
                        <h2 class="text-sm text-black">Billed To:</h2>
                        <h3 class="mt-1 text-lg font-bold capitalize text-primary-600">{{ $invoice->subscription->billingAddress->name }}</h3>
                        <p class="text-sm text-gray-700">{{ $invoice->subscription->billingAddress->address }} - {{ $invoice->subscription->billingAddress->pincode }}</p>
                        <p class="mt-2 text-sm text-gray-700"><b>Phone:</b> {{ $invoice->subscription->billingAddress->phone_number }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- items -->
        <div class="w-full mt-12 relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-700">
                <thead class="text-sm font-light text-gray-900 capitalize bg-primary-100 border-b-2 border-primary-300">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-4 py-3">
                            QTY
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Rate
                        </th>
                        <th scope="col" class="pl-4 py-3">
                            Amount
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b border-gray-300 align-top">
                        <td class="p-4">
                            1
                        </td>
                        <th scope="row" class="p-4 font-medium text-gray-900 whitespace-wrap max-w-xs capitalize">
                            {{ $invoice->plan->name }}
                        </th>
                        <td class="p-4">
                            {{ $invoice->subscription->total_count }}
                        </td>
                        <td class="p-4">
                            ₹{{ $invoice->price }}
                        </td>
                        <td class="p-4 pr-0">
                            ₹{{ $invoice->sub_total }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- total -->
        <div class="w-full mt-6 flex justify-end">
            <div class="w-full max-w-xs bg-white">
                <table class="w-full text-sm text-left bg-white align-top">
                    <tr>
                        <th scope="row" class="pb-4 text-gray-900 font-bold whitespace-nowrap">
                            Sub Total
                        </th>
                        <td class="pb-4">
                            ₹{{ $invoice->sub_total }}
                        </td>
                    </tr>
                    <!-- <tr>
                        <th scope="row" class="pt-2 text-gray-900 font-bold whitespace-nowrap">
                            Tax(18%)
                        </th>
                        <td class="pt-2">
                            ₹5,400.00
                        </td>
                    </tr> -->
                    @if ($invoice->discount > 0)
                    <tr>
                        <th scope="row" class="pt-2 pb-4 text-gray-900 font-bold whitespace-nowrap">
                            Discount
                        </th>
                        <td class="pt-2 pb-4">
                            ₹{{ $invoice->discount }}
                        </td>
                    </tr>
                    @endif
                    <tr class="bg-primary-100 text-black text-lg font-bold">
                        <th scope="row" class="py-2 px-4 whitespace-nowrap">
                            Total
                        </th>
                        <td class="py-2 pr-4">
                            ₹{{ $invoice->total }}
                        </td>
                    </tr>
                </table>

                <div class="w-full mt-4">
                    <h3 class="text-sm text-gray-400">Invoice Total In Words</h3>
                    <p class="mt-1 text-base text-gray-700 capitalize">{{ $invoice->getPriceInWords($invoice->price) }} rupees only</p>
                </div>
            </div>
        </div>

        <div class="w-full mt-8 text-center border-t border-gray-300 p-4">
            <p class="text-base text-gray-800">Thank you for your being a member!</p>
            <p class="mt-1 text-xs text-gray-500">This is a computer-generated document and does not require a signature.</p>
        </div>
    </main>
</body>
</html>