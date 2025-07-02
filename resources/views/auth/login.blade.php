<x-guest-layout>
    <x-slot:title>
        Sign In
    </x-slot>

    <form class="space-y-6" action="{{ route('auth.login', ['redirect' => request()->query('redirect')??'']) }}" method="POST">
        @csrf
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div class="mt-2">
                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-primary-500 block w-full p-2.5 focus:outline-none" placeholder="Email">
            </div>                                  
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="text-sm">
                    <a href="#" class="font-semibold text-primary-600 hover:text-primary-500">Forgot password?</a>
                </div>
            </div>
            <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:border-primary-500 block w-full p-2.5 focus:outline-none" placeholder="Password">
            </div>
        </div>

        <div>
            <button type="submit" class="flex w-full justify-center items-center gap-4 rounded-md bg-primary-600 px-3 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Sign in</button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <a class="underline text-sm text-gray-600 hover:text-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('auth.register') }}">
            {{ __('New to Annahda?') }}
        </a>
    </div>
</x-guest-layout>
