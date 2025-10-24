<header class="w-full px-4 lg:px-8 bg-white">
    <div class="w-full max-w-7xl mx-auto flex items-center justify-between gap-8">
        <div class="w-full flex items-center gap-6">
            <!-- Logo -->
            <div class="py-3 shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{asset('assets/annahda-logo.svg')}}" alt="" class="h-7">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-4 lg:flex font-medium text-base">
                <a href="{{route('app.dashboard')}}" class="block py-4 px-4 {{ request()->routeIs('app.dashboard') ? 'text-primary-600 border-b border-primary-500 font-bold' : 'text-gray-700 hover:text-primary-700 hover:bg-gray-50' }}">Dashboard</a>
                <a href="{{route('app.blog.index')}}" class="block py-4 px-4 {{ request()->routeIs('app.blog.index') ? 'text-primary-600 border-b border-primary-500 font-bold' : 'text-gray-700 hover:text-primary-700 hover:bg-gray-50' }}">My Articles</a>
                <a href="{{route('app.subscriptions.index')}}" class="block py-4 px-4 {{ request()->routeIs('app.subscriptions.index') ? 'text-primary-600 border-b border-primary-500 font-bold' : 'text-gray-700 hover:text-primary-700 hover:bg-gray-50' }}">My Subscriptions</a>
            </div>
        </div>
        <div class="w-full py-3 flex justify-end items-center relative">
            <!-- sidebar toggle button -->
            <button class="lg:hidden mr-6 flex-grow" id="sidebar-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 fill-gray-900"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg>
            </button>
    
            <!-- notification content -->
            <div>
                <button type="button" class="mr-6 relative inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-center text-white bg-slate-200 rounded-full group focus:outline-none focus:bg-blue-300 hover:bg-blue-200" id="notifications-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-gray-500 group-hover:fill-gray-900 group-focus:fill-gray-900"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"></path></svg>
                    <span class="sr-only">Notifications</span>
                    <div class="absolute inline-flex items-center justify-center w-5 h-5 font-medium text-white bg-red-500 rounded-full -top-1 -end-2" style="font-size: 10px;">0</div>
                </button>
    
                <!-- notifications -->
                <div class="hidden absolute top-full right-16 origin-top z-50 min-w-72 min-h-28 max-h-80 overflow-auto mt-6 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="notifications-dropdown">
                    <div class="w-full h-full py-2 divide-y divide-gray-100">
                        <!-- no notifications -->
                        <p class="text-sm text-gray-500">no notifications</p>
                    </div>
                </div>
            </div>
    
            <!-- user menu -->
            <div>
                <button type="button" class="flex bg-white rounded-full md:me-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    @if( isset(auth()->user()->profile)  &&  auth()->user()->profile)
                    <img class="w-10 h-10 rounded-full object-cover" src="{{env('IMAGEKIT_ENDPOINT') . '/' . auth()->user()->profile}}" alt="user photo">
                    @else
                    <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-slate-300 rounded-full">
                        <span class="text-base font-bold text-gray-600">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                    @endif
                </button>
        
                <!-- Dropdown menu -->
                <div class="absolute top-full right-0 origin-top z-50 hidden mt-6 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown" >
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900">{{ auth()->user()->name }}</span>
                        <span class="block text-sm  text-gray-500 truncate">{{ auth()->user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Home
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
        
                                <a href="{{ route('auth.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Sign out
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>