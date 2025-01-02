<x-guest-layout>
    <x-slot:title>
        Register
    </x-slot>

    <form method="POST" action="/register" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Full Name</label>
            <div class="mt-2">
                <input id="name" name="name" type="text" autocomplete="name" required class="block w-full rounded-md border-0 px-3 py-2 bg-slate-100 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm/6" placeholder="name">
            </div>
            @error('name') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p> @enderror                           
        </div>

        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 px-3 py-2 bg-slate-100 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm/6" placeholder="Email">
            </div>      
            @error('email') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p> @enderror                               
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
            <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="new-password" required class="block w-full rounded-md border-0 px-3 py-2 bg-slate-100 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm/6">
            </div>      
            @error('password') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p> @enderror                             
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">Confirm Password</label>
            <div class="mt-2">
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="block w-full rounded-md border-0 px-3 py-2 bg-slate-100 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-600 sm:text-sm/6">
            </div>         
            @error('password_confirmation') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p> @enderror                             
        </div>

        <button type="submit" class="flex w-full justify-center rounded-md bg-primary-600 px-3 px-3 py-2 text-sm/6 font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Register</button>
    </form>

    <div class="mt-6 text-center">
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('auth.login') }}">
            {{ __('Already registered?') }}
        </a>
    </div>
</x-guest-layout>
