<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="og:site_name" content="Annahdha">
    <title>Annahda Plus Membership</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-full">
  <x-header />

  <x-alert />

  <section class="w-full container mx-auto py-8 px-6">
    {{-- <form action="{{ route('app.address.create') }}" method="POST" id="address-form" class="mx-auto max-w-screen-xl px-4 2xl:px-0"> --}}
      {{-- @csrf --}}
      <div class="my-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
        <div class="min-w-0 flex-1 space-y-8">
          {{-- billing address --}}
          <div class="w-full">
            {{-- header --}}
            <div class="w-full flex items-center justify-between gap-6">
              <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Billing Address</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Please select your billing address to proceed with the payment.</p>
              </div>

              <button type="button" id="openModalBtn" data-modal-show="address-modal" class="flex w-fit items-center justify-center gap-2 rounded-lg border border-gray-400 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                </svg>
                Add new address
              </button>
            </div>

            {{-- List available addresses --}}
            <div class="w-full mt-4">
              <ul class="grid w-full gap-6 md:grid-cols-2">
                @forelse (auth()->user()->addresses as $key => $address)
                <li>
                    <input type="radio" id="billingAddress{{ $key }}" name="billing_address" value="{{ $address->id }}" class="hidden peer" required />
                    <label for="billingAddress{{ $key }}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 dark:peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                        <div class="block">
                            <div class="w-full text-lg font-semibold">{{ $address->name }}</div>
                            <div class="w-full text-gray-500">
                              {{ $address->address }} - {{ $address->state }}, {{ $address->country }}, {{ $address->pincode }} <br>
                              Phone: {{ $address->phone_number }}
                            </div>
                        </div>
                    </label>
                </li>
                @empty
                <li>
                    <div class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                        <div class="block">
                            <div class="w-full text-lg font-semibold">No Address Found</div>
                            <div class="w-full text-gray-500">Please add a new address</div>
                        </div>
                    </div>
                </li>
                @endforelse
              </ul>
            </div>
          </div>

          {{-- same address checkbox --}}
          {{-- <div class="flex items-center mb-4">
              <input id="same-address-checkbox" type="checkbox" value="sameaddress" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
              <label for="same-address-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ship to the same Billing Address</label>
          </div> --}}

          {{-- shipping address --}}
          <div class="w-full" id="shipping-address-section">
            {{-- header --}}
            <div class="w-full flex items-center justify-between gap-6">
              <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Shipping Address</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Please select your shipping address where your magazine will be delivered.</p>
              </div>
            </div>

            {{-- List available addresses --}}
            <div class="w-full mt-4">
              <ul class="grid w-full gap-6 md:grid-cols-2">
                @forelse (auth()->user()->addresses as $key => $address)
                <li>
                    <input type="radio" id="shippingAddress{{ $key }}" name="shipping_address" value="{{ $address->id }}" class="hidden peer" required />
                    <label for="shippingAddress{{ $key }}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 dark:peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                        <div class="block">
                            <div class="w-full text-lg font-semibold">{{ $address->name }}</div>
                            <div class="w-full text-gray-500">
                              {{ $address->address }} - {{ $address->state }}, {{ $address->country }}, {{ $address->pincode }} <br>
                              Phone: {{ $address->phone_number }}
                            </div>
                        </div>
                    </label>
                </li>
                @empty
                <li>
                    <div class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                        <div class="block">
                            <div class="w-full text-lg font-semibold">No Address Found</div>
                            <div class="w-full text-gray-500">Please add a new address</div>
                        </div>
                    </div>
                </li>
                @endforelse
              </ul>
            </div>
          </div>
        </div>
  
        <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
          <div class="flow-root">
            <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
              <dl class="flex items-center justify-between gap-4 py-3">
                <dt class="text-base font-normal text-gray-600 dark:text-gray-400">
                  Years
                  <br>
                  <span class="text-xs text-gray-500">Select the duration of your subscription</span>
                </dt>
                <dd class="text-base font-medium text-gray-900 dark:text-white">
                  <input type="hidden" id="unit_price" value="{{ $plan->sale_price }}" />
                  <select id="subscription-months" required class="block w-fit pr-8 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                    <option value="1">1 Year</option>
                    <option value="2">2 Year</option>
                  </select>
                </dd>
              </dl>

              <dl class="flex items-center justify-between gap-4 py-3">
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Unit Price</dt>
                <dd class="text-base font-medium text-gray-900 dark:text-white">₹<span id="unit-price">{{ $plan->sale_price }}</span></dd>
              </dl>

              <dl class="flex items-center justify-between gap-4 py-3">
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Sub Total</dt>
                <dd class="text-base font-medium text-gray-900 dark:text-white">₹<span id="sub-total">{{ $plan->sale_price }}</span></dd>
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
                <dd class="text-base font-bold text-gray-900 dark:text-white">₹<span id="total-price">{{ $plan->sale_price }}</span></dd>
              </dl>
            </div>
          </div>
  
          <div class="space-y-3">
            <button type="button" id="proceedToPaymentBtn" disabled class="flex w-full items-center justify-center gap-2 rounded-lg bg-primary-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 disabled:bg-gray-400">Proceed to Payment</button>
          </div>
        </div>
      </div>
    {{-- </form> --}}
  </section>

  <x-footer />

  <x-modal id="address-modal" title="Add New Address">
    <form action="{{ route('app.address.create') }}" method="POST" id="address-form" class="grid grid-cols-1 gap-4 sm:grid-cols-2">
      @csrf
      <div>
        <label for="full_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your Full Name* </label>
        <input type="text" id="full_name" name="name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Bonnie Green" required />
      </div>

      <div>
        <div class="mb-2 flex items-center gap-2">
          <label for="select-country" class="block text-sm font-medium text-gray-900 dark:text-white"> Country* </label>
        </div>
        <select id="select-country" name="country" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" required>
          <option value="dd" selected>Select Country</option>
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
        <input type="text" id="state" name="state" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="State" required />
      </div>

      <div class="sm:col-span-2">
        <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Address* </label>
        <textarea id="address" name="address" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" required placeholder="Address"></textarea>
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
        <input type="number" id="pincode" name="pincode" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Pincode" required />
      </div>

      <div class="sm:col-span-2">
        <button type="submit" class="mt-6 flex w-full items-center justify-center gap-2 rounded-lg bg-primary-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300">
          <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
          </svg>
          Add new address
        </button>
      </div>
    </form>
  </x-modal>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script>
    $(document).ready(function(){
      var addresses = {
        'billing': null,
        'shipping': null
      }
      var sameAddress = false;

      // get countries
      function getCountries(){
        $.ajax('https://countriesnow.space/api/v0.1/countries/info?returns=flag,dialCode',{
          'method':'GET',
          'success': function(response){
              $('#address-modal #select-country').empty();
    
              const { data } = response;
              data.sort((a, b) => a.name.localeCompare(b.name));
              data.forEach(function(item){
                  $("#address-modal #select-country").append(`<option value="${item?.name}" data-code="${item?.dialCode}">${item?.name}</option>`);
              });
    
              $('#address-modal #select-country option[value="India"]').prop('selected', true);
          },
          'error': function(error){
            alert('Error fetching countries');
            window.location('/');
          }
        });
      }
    
      $(document).on('change', '#select-country', function() {
        const selectedOption = $(this).find(':selected');
        const countryCode = selectedOption.data('code');
        $('#country_code').val(countryCode);
        $('#country-code-display').text(countryCode);
      });

      // open modal
      $(document).on('click', '#openModalBtn', function(event) {
        event.preventDefault();
        const modalId = $(this).data('modal-show');
        $('#' + modalId).removeClass('hidden');

         // countries
        getCountries();
      });

      // close modal
      $(document).on('click', '#closeModalBtn', function(event) {
        event.preventDefault();
        const modalId = $(this).data('modal-hide');
        $('#' + modalId).addClass('hidden');
      });

      // change of billing address
      $(document).on('change', 'input[type="radio"][name="billing_address"]', function() {
        const address = $(this).val();

        if (address) {
          checkAddressSelection()
          // $('#proceedToPaymentBtn').prop('disabled', false);
        } else {
          // $('#proceedToPaymentBtn').prop('disabled', true);
        }
      });

      // change of shipping address
      $(document).on('change', 'input[type="radio"][name="shipping_address"]', function() {
        const address = $(this).val();

        if (address) {
          checkAddressSelection()
          // $('#proceedToPaymentBtn').prop('disabled', false);
        } else {
          // $('#proceedToPaymentBtn').prop('disabled', true);
        }
      });

      const checkAddressSelection = function() {
        const billingAddress = $('input[type="radio"][name="billing_address"]:checked').val();
        const shippingAddress = $('input[type="radio"][name="shipping_address"]:checked').val();

        if (billingAddress && shippingAddress) {
          $('#proceedToPaymentBtn').prop('disabled', false);
        } else {
          $('#proceedToPaymentBtn').prop('disabled', true);
        }
      };

      // change of subscription months
      $('#subscription-months').on('change', function() {
        const months = $(this).val();
        const unitPrice = parseFloat($('#unit_price').val());
        const totalPrice = (months * unitPrice).toFixed(2);
        
        $('#unit-price').text(unitPrice.toFixed(2));
        $('#sub-total').text(totalPrice);
        $('#total-price').text(totalPrice);
      });

      // proceed to payment
      $('#proceedToPaymentBtn').on('click', function(){
        const paymentBtn = $('#proceedToPaymentBtn');
        paymentBtn.prop('disabled', true);
        paymentBtn.html('Processing Payment <div role="status" class="mr-2"><svg aria-hidden="true" class="w-6 h-6 text-primary-100 animate-spin fill-primary-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg></div>');

        const billingAddress = $('input[type="radio"][name="billing_address"]:checked').val();
        const shippingAddress = $('input[type="radio"][name="shipping_address"]:checked').val();
        const plan = '{{ $plan->razorpay_plan_id }}';
        const quantity = $('#subscription-months').val();

        $.ajax('/create-subscription',{
            'method':'POST',
            'data': {
              '_token': '{{ csrf_token() }}',
              'plan': plan,
              'billing_address': billingAddress,
              'shipping_address': shippingAddress,
              'user': '{{auth()->id()}}',
              'quantity': quantity,
            },
            'dataType': 'json',
            'success': function(response){
              var options = {
                "key": "{{config('services.razorpay.key')}}",
                "subscription_id": response.subscription_id,
                "description": `Authentication payment for ${response.subscription_id}`,
                "currency": "INR",
                "name": "Annahda",
                "image": "{{asset('assets/annahda-logo.png')}}",
                "callback_url": "{{route('subscription.success')}}",
                "theme": {
                  "color": "#059666"
                },
                "prefill": {
                  "name": "{{auth()->user()->name}}",
                  "email": "{{auth()->user()->email}}",
                  "contact": response.phone,
                },
              };
              var rzp1 = new Razorpay(options);
              rzp1.open();

              rzp1.on('payment.failed', function (response){
                alert(response.error.reason);
              })
            },
            'complete': function() {
                paymentBtn.prop('disabled', false);
                paymentBtn.html("Make Payment");
            }
        });
      });

      $('#same-address-checkbox').on('change', function() {
        if ($(this).is(':checked')) {
          $('#shipping-address-section').hide();
        } else {
          $('#shipping-address-section').show();
        }
      });
    });
  </script>
</body>
</html>