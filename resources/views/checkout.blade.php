<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="og:site_name" content="Annahdha">
    <title>Annahda Plus Membership</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-full">
  <x-header />

  <section class="w-full py-8">
    <form action="{{ route('app.address.create') }}" method="POST" id="address-form" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      @csrf
      <div class="my-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
        <div class="min-w-0 flex-1 space-y-8">
          <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Billing Address</h2>
  
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <div>
                <label for="your_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your Full Name* </label>
                <input type="text" id="full_name" name="full_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Bonnie Green" required />
              </div>
  
              <div>
                <div class="mb-2 flex items-center gap-2">
                  <label for="select-country" class="block text-sm font-medium text-gray-900 dark:text-white"> Country* </label>
                </div>
                <select id="select-country" name="country" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" required>
                  <option value="" selected>Select Country</option>
                </select>
              </div>

              <div>
                <label for="phone-number" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Phone Number* </label>
                <input type="hidden" name="country_code" id="country_code" value="+91" />
                <div class="flex items-center">
                  <button id="country-code-display" class="z-10 inline-flex shrink-0 items-center rounded-s-lg border border-gray-300 bg-gray-100 px-4 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700" type="button">
                    +91
                  </button>
                  <div class="relative w-full">
                    <input type="text" id="phone-number" name="phone_number" class="z-20 block w-full rounded-e-lg border border-s-0 border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:border-s-gray-700  dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500" placeholder="0000000000" required />
                  </div>
                </div>
              </div>
  
              <div>
                <div class="mb-2 flex items-center gap-2">
                  <label for="state" class="block text-sm font-medium text-gray-900 dark:text-white"> State* </label>
                </div>
                <input type="text" id="state" name="state" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="City" required />
              </div>

              <div class="sm:col-span-2">
                <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Address* </label>
                <textarea id="address" name="address" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" required ></textarea>
              </div>

              <div>
                <div class="mb-2 flex items-center gap-2">
                  <label for="city" class="block text-sm font-medium text-gray-900 dark:text-white"> City* </label>
                </div>
                <input type="text" id="city" name="city" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="City" required />
              </div>

              <div>
                <div class="mb-2 flex items-center gap-2">
                  <label for="pincode" class="block text-sm font-medium text-gray-900 dark:text-white"> Pincode* </label>
                </div>
                <input type="number" id="pincode" name="pincode" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="City" required />
              </div>

              <div class="sm:col-span-2">
                <button type="submit" class="mt-6 flex w-full items-center justify-center gap-2 rounded-lg bg-primary-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300">
                  <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                  </svg>
                  Add new address
                </button>
              </div>
            </div>
          </div>
        </div>
  
        <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
          <div class="flow-root">
            <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
              <dl class="flex items-center justify-between gap-4 py-3">
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Price</dt>
                <dd class="text-base font-medium text-gray-900 dark:text-white">INR {{ $plan->price }}</dd>
              </dl>

              <dl class="flex items-center justify-between gap-4 py-3">
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Sale Price</dt>
                <dd class="text-base font-medium text-gray-900 dark:text-white">INR {{ $plan->sale_price }}</dd>
              </dl>
  
              <dl class="flex items-center justify-between gap-4 py-3">
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                <dd class="text-base font-medium text-green-500">{{ $plan->discount_percentage }}%</dd>
              </dl>
  
              {{-- <dl class="flex items-center justify-between gap-4 py-3">
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                <dd class="text-base font-medium text-gray-900 dark:text-white">$199</dd>
              </dl> --}}
  
              <dl class="flex items-center justify-between gap-4 py-3">
                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                <dd class="text-base font-bold text-gray-900 dark:text-white">INR {{ $plan->sale_price }}</dd>
              </dl>
            </div>

            <div class="mt-8">
              <label for="voucher" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Enter a gift card, voucher or promotional code </label>
              <div class="flex max-w-md items-center gap-4">
                <input type="text" id="voucher" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Enter promocode" required />
                <button type="button" class="flex items-center justify-center rounded-lg bg-primary-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300">Apply</button>
              </div>
            </div>
          </div>
  
          <div class="space-y-3">
            <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300">Proceed to Payment</button>
          </div>
        </div>
      </div>
    </form>
  </section>

  <x-footer />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // countries
    $.ajax('https://countriesnow.space/api/v0.1/countries/info?returns=flag,dialCode',{
        'method':'GET',
        'success': function(response){
            $('#select-country').empty();

            const { data } = response;
            data.sort((a, b) => a.name.localeCompare(b.name));
            data.forEach(function(item){
                $("#select-country").append(`<option value="${item?.name}" data-code="${item?.dialCode}">${item?.name}</option>`);
            });

            $('#select-country option[value="India"]').prop('selected', true);
        },
        'error': function(error){
          alert('Error fetching countries');
          window.location('/');
        }
    });

    $(document).on('change', '#select-country', function() {
      const selectedOption = $(this).find(':selected');
      const countryCode = selectedOption.data('code');
      $('#country_code').val(countryCode);
      $('#country-code-display').text(countryCode);
    });

    // $('#address-form').submit(function(event){
    //   event.preventDefault();
    //   const submitBtn = $(this).find('button[type=submit]');
    //   submitBtn.prop('disabled', true);
    //   submitBtn.html('Adding Address <div role="status" class="mr-2"><svg aria-hidden="true" class="w-6 h-6 text-primary-100 animate-spin fill-primary-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg></div>');

    //   $.ajax('/update-address',{
    //     'method':'POST',
    //     'headers': {
    //       'X-CSRF-TOKEN': '{{ csrf_token() }}', // Or as a form value
    //     },
    //     'data': {
    //       'name' : $('#full_name').val(),
    //       'country': $('#select-country').val(),
    //       'country_code': $('#country_code').val(),
    //       'phone_number': $('#phone-number').val(),
    //       'city': $('#city').val(),
    //       'address': $('#address').val(),
    //       'state': $('#state').val(),
    //       'pincode': $('#pincode').val(),
    //       'email': '{{auth()->user()->email}}',
    //     },
    //     'dataType': 'json',
    //     'success': function(response){
    //       $('#payments-btn').prop('disabled', false);
    //     },
    //     'complete': function() {
    //       // Optional: Hide the loading indicator and re-enable the button
    //       submitBtn.prop('disabled', false);
    //       submitBtn.html("Update Address");
    //     }
    //   });
    // })
  </script>
</body>
</html>