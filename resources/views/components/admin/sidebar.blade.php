<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-72 transition -translate-x-full lg:translate-x-0 delay-100 duration-500 ease-in-out" aria-label="Sidebar">
    <div class="w-full h-screen flex flex-col bg-white border-r-2 border-gray-200">
        <div class="w-full h-full">
            <div class="px-7 py-4 border-b-2 border-gray-200 flex items-center">
                <img src="{{asset('assets/annahda-logo.svg')}}" alt="Interior Logo" class="h-8">
            </div>
        
            <div class="w-full h-[calc(100%-4rem)] px-4 pt-6 overflow-y-auto">
                <div class="w-full mb-8 space-y-8 divide divide-gray-200">
                    {{-- general --}}
                    <div class="w-full">
                        <p class="px-3 text-xs font-medium text-gray-400 tracking-wide uppercase">General</p>
                        <ul class="w-full mt-2 space-y-2 font-medium">
                            <li>
                                <a href="{{ route('admin.dashboard') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Route::current()->getName() == 'admin.dashboard' ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 transition duration-75 {{ Route::current()->getName() == 'admin.dashboard' ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                    </svg>
                                    <span class="ms-4 text-base {{ Route::current()->getName() == 'admin.dashboard' ? 'text-primary-600 font-bold' : '' }}">Dashboard</span>
                                </a>
                            </li>
                            @can('manage users')
                            <li>
                                <a href="{{ route('admin.users') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Route::current()->getName() == 'admin.users' ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 transition duration-75 {{ Route::current()->getName() == 'admin.users' ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z"></path></svg>
                                    <span class="ms-4 text-base {{ Route::current()->getName() == 'admin.users' ? 'text-primary-600 font-bold' : '' }}">Users</span>
                                </a>
                            </li>
                            @endcan
                            <li>
                                <a href="{{ route('admin.slides') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Route::current()->getName() == 'admin.slides' ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 transition duration-75 {{ Route::current()->getName() == 'admin.slides' ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-13.5 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm5.5 10h-7l4-5 1.5 2 3-4 5.5 7h-7z"></path></svg>
                                    <span class="ms-4 text-base {{ Route::current()->getName() == 'admin.slides' ? 'text-primary-600 font-bold' : '' }}">Slides</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.popup') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Route::current()->getName() == 'admin.popup' ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 transition duration-75 {{ Route::current()->getName() == 'admin.popup' ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 18h2v4.081L11.101 18H16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2z"></path><path d="M20 2H8c-1.103 0-2 .897-2 2h12c1.103 0 2 .897 2 2v8c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2z"></path></svg>
                                    <span class="ms-4 text-base {{ Route::current()->getName() == 'admin.popup' ? 'text-primary-600 font-bold' : '' }}">Popups</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.pages') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Route::current()->getName() == 'admin.pages' ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 transition duration-75 {{ Route::current()->getName() == 'admin.pages' ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 3H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm-9 14H5v-2h6v2zm8-4H5v-2h14v2zm0-4H5V7h14v2z"></path></svg>
                                    <span class="ms-4 text-base {{ Route::current()->getName() == 'admin.pages' ? 'text-primary-600 font-bold' : '' }}">Pages</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('admin.coupon') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Route::current()->getName() == 'admin.coupon' ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 transition duration-75 {{ Route::current()->getName() == 'admin.coupon' ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21 5H3a1 1 0 0 0-1 1v4h.893c.996 0 1.92.681 2.08 1.664A2.001 2.001 0 0 1 3 14H2v4a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-4h-1a2.001 2.001 0 0 1-1.973-2.336c.16-.983 1.084-1.664 2.08-1.664H22V6a1 1 0 0 0-1-1zM9 9a1 1 0 1 1 0 2 1 1 0 1 1 0-2zm-.8 6.4 6-8 1.6 1.2-6 8-1.6-1.2zM15 15a1 1 0 1 1 0-2 1 1 0 1 1 0 2z"></path></svg>
                                    <span class="ms-4 text-base {{ Route::current()->getName() == 'admin.coupon' ? 'text-primary-600 font-bold' : '' }}">Coupon</span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ route('admin.magazine') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Route::current()->getName() == 'admin.magazine' ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 transition duration-75 {{ Route::current()->getName() == 'admin.magazine' ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.012 18H21V4a2 2 0 0 0-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1zM8 6h9v2H8V6z"></path></svg>
                                    <span class="ms-4 text-base {{ Route::current()->getName() == 'admin.magazine' ? 'text-primary-600 font-bold' : '' }}">Magazine</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.plan') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Route::current()->getName() == 'admin.plan' ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 transition duration-75 {{ Route::current()->getName() == 'admin.plan' ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 3H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm-9 14H5v-2h6v2zm8-4H5v-2h14v2zm0-4H5V7h14v2z"></path></svg>
                                    <span class="ms-4 text-base {{ Route::current()->getName() == 'admin.plan' ? 'text-primary-600 font-bold' : '' }}">Plans</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- articles --}}
                    <div class="w-full">
                        <p class="px-3 text-xs font-medium text-gray-400 tracking-wide uppercase">Articles</p>
                        <ul class="w-full mt-2 space-y-2 font-medium">
                            @can('view articles')
                            <li>
                                <a href="{{ route('admin.blog.index') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Str::startsWith(Route::current()->getName(), 'admin.blog.index') ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">              
                                    <svg class="w-5 h-5 transition duration-75 {{ Str::startsWith(Route::current()->getName(), 'admin.blog.index') ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 22a2 2 0 0 0 2-2V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12zM13 4l5 5h-5V4zM7 8h3v2H7V8zm0 4h10v2H7v-2zm0 4h10v2H7v-2z"></path></svg>            
                                    <span class="ms-4 text-base {{ Str::startsWith(Route::current()->getName(), 'admin.blog.index') ? 'text-primary-600 font-bold' : '' }}">Articles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.blog.list') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Str::startsWith(Route::current()->getName(), 'admin.blog.list') ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">              
                                    <svg class="w-5 h-5 transition duration-75 {{ Str::startsWith(Route::current()->getName(), 'admin.blog.list') ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 22a2 2 0 0 0 2-2V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12zM13 4l5 5h-5V4zM7 8h3v2H7V8zm0 4h10v2H7v-2zm0 4h10v2H7v-2z"></path></svg>            
                                    <span class="ms-4 text-base {{ Str::startsWith(Route::current()->getName(), 'admin.blog.list') ? 'text-primary-600 font-bold' : '' }}">Requested Articles</span>
                                </a>
                            </li>
                            @endcan
                            @can('manage categories')
                            <li>
                                <a href="{{ route('admin.categories') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Str::startsWith(Route::current()->getName(), 'admin.categories') ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">      
                                    <svg class="w-5 h-5 transition duration-75 {{ Str::startsWith(Route::current()->getName(), 'admin.categories') ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9 21h12V3H3v18h6zm10-4v2h-6v-6h6v4zM15 5h4v6h-6V5h2zM5 7V5h6v6H5V7zm0 12v-6h6v6H5z"></path></svg>                           
                                    <span class="ms-4 text-base {{ Str::startsWith(Route::current()->getName(), 'admin.categories') ? 'text-primary-600 font-bold' : '' }}">Categories</span>
                                </a>
                            </li>
                            @endcan
                            @can('manage tags')
                            <li>
                                <a href="{{ route('admin.tags') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Str::startsWith(Route::current()->getName(), 'admin.tags') ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">    
                                    <svg class="w-5 h-5 transition duration-75 {{ Str::startsWith(Route::current()->getName(), 'admin.tags') ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2z"></path></svg>                  
                                    <span class="ms-4 text-base {{ Str::startsWith(Route::current()->getName(), 'admin.tags') ? 'text-primary-600 font-bold' : '' }}">Tags</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>

                    {{-- admins --}}
                    <div class="w-full">
                        <p class="px-3 text-xs font-medium text-gray-400 tracking-wide uppercase">Admins</p>
                        <ul class="w-full mt-2 space-y-2 font-medium">
                            @can('manage admins')
                            <li>
                                <a href="{{ route('admin.admins') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Str::startsWith(Route::current()->getName(), 'admin.admins') ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 transition duration-75 {{ Str::startsWith(Route::current()->getName(), 'admin.admins') ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 22h13a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h1zm6-17.001c1.647 0 3 1.351 3 3C15 9.647 13.647 11 12 11S9 9.647 9 7.999c0-1.649 1.353-3 3-3zM6 17.25c0-2.219 2.705-4.5 6-4.5s6 2.281 6 4.5V18H6v-.75z"></path></svg>                                 
                                    <span class="ms-4 text-base {{ Str::startsWith(Route::current()->getName(), 'admin.admins') ? 'text-primary-600 font-bold' : '' }}">Admins</span>
                                </a>
                            </li>
                            @endcan
                            @can('manage roles')
                            <li>
                                <a href="{{ route('admin.roles') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Str::startsWith(Route::current()->getName(), 'admin.roles') ? 'bg-zinc-100' : 'hover:bg-gray-100' }}"> 
                                    <svg class="w-5 h-5 transition duration-75 {{ Str::startsWith(Route::current()->getName(), 'admin.roles') ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21 6c0-1.654-1.346-3-3-3a2.993 2.993 0 0 0-2.815 2h-6.37A2.993 2.993 0 0 0 6 3C4.346 3 3 4.346 3 6c0 1.302.839 2.401 2 2.815v6.369A2.997 2.997 0 0 0 3 18c0 1.654 1.346 3 3 3a2.993 2.993 0 0 0 2.815-2h6.369a2.994 2.994 0 0 0 2.815 2c1.654 0 3-1.346 3-3a2.997 2.997 0 0 0-2-2.816V8.816A2.996 2.996 0 0 0 21 6zm-3-1a1.001 1.001 0 1 1-1 1c0-.551.448-1 1-1zm-2.815 12h-6.37A2.99 2.99 0 0 0 7 15.184V8.816A2.99 2.99 0 0 0 8.815 7h6.369A2.99 2.99 0 0 0 17 8.815v6.369A2.99 2.99 0 0 0 15.185 17zM6 5a1.001 1.001 0 1 1-1 1c0-.551.448-1 1-1zm0 14a1.001 1.001 0 0 1 0-2 1.001 1.001 0 0 1 0 2zm12 0a1.001 1.001 0 0 1 0-2 1.001 1.001 0 0 1 0 2z"></path></svg>                               
                                    <span class="ms-4 text-base {{ Str::startsWith(Route::current()->getName(), 'admin.roles') ? 'text-primary-600 font-bold' : '' }}">Roles</span>
                                </a>
                            </li>                                
                            @endcan
                            @can('manage permissions')    
                            <li>
                                <a href="{{ route('admin.permissions') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Str::startsWith(Route::current()->getName(), 'admin.permissions') ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 transition duration-75 {{ Str::startsWith(Route::current()->getName(), 'admin.permissions') ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C9.243 2 7 4.243 7 7v3H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-1V7c0-2.757-2.243-5-5-5zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7zm4 10.723V20h-2v-2.277a1.993 1.993 0 0 1 .567-3.677A2.001 2.001 0 0 1 14 16a1.99 1.99 0 0 1-1 1.723z"></path></svg>                           
                                    <span class="ms-4 text-base {{ Str::startsWith(Route::current()->getName(), 'admin.permissions') ? 'text-primary-600 font-bold' : '' }}">Permissions</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>

                    {{-- accounting --}}
                    <div class="w-full">
                        <p class="px-3 text-xs font-medium text-gray-400 tracking-wide uppercase">Accounting</p>
                        <ul class="w-full mt-2 space-y-2 font-medium">
                            @can('manage journal')
                            <li>
                                <a href="{{ route('admin.accounting.journal') }}" class="w-full flex items-center px-3 py-2 text-gray-900 group rounded-lg {{ Str::startsWith(Route::current()->getName(), 'admin.accounting.journal') ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-5 h-5 transition duration-75 {{ Str::startsWith(Route::current()->getName(), 'admin.accounting.journal') ? 'fill-primary-600' : 'fill-gray-500 group-hover:fill-gray-900' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21 4H3a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-1 11a3 3 0 0 0-3 3H7a3 3 0 0 0-3-3V9a3 3 0 0 0 3-3h10a3 3 0 0 0 3 3v6z"></path><path d="M12 8c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path></svg>                                   
                                    <span class="ms-4 text-base {{ Str::startsWith(Route::current()->getName(), 'admin.accounting.journal') ? 'text-primary-600 font-bold' : '' }}">Journal</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>