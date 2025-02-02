<header class="w-full bg-white">
    <div class="w-full bg-white container mx-auto px-6 py-4">
        <div class="w-full flex items-center justify-between gap-6">
            <div class="w-fit flex items-center gap-6">
                <div>
                    <a href="{{ url('search') }}">
                        <svg class="w-7 h-7 fill-black hover:fill-primary-500" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z">
                            </path>
                        </svg>
                    </a>
                </div>

                {{-- social media links --}}
                <ul class="flex items-center gap-4">
                    <li>
                        <a href="https://youtube.com/channel/UCsEz99OeJmUrVPvZ5_dDmLA"
                            class="w-6 h-6 bg-black hover:bg-primary-500 inline-flex items-center justify-center rounded-full">
                            <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M21.593 7.203a2.506 2.506 0 0 0-1.762-1.766C18.265 5.007 12 5 12 5s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.515 2.515 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831zM9.996 15.005l.005-6 5.207 3.005-5.212 2.995z">
                                </path>
                            </svg>
                            <span class="sr-only">Youtube link</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com/annahdaarabic"
                            class="w-6 h-6 bg-black hover:bg-primary-500 inline-flex items-center justify-center rounded-full">
                            <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z">
                                </path>
                                <circle cx="16.806" cy="7.207" r="1.078"></circle>
                                <path
                                    d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z">
                                </path>
                            </svg>
                            <span class="sr-only">Instagram Link</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/annahda.in/"
                            class="w-6 h-6 bg-black hover:bg-primary-500 inline-flex items-center justify-center rounded-full">
                            <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z">
                                </path>
                            </svg>
                            <span class="sr-only">Facebook Link</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="w-fit inline-flex items-center gap-2">
                <a href="{{ route('dashboard') }}">
                    <svg class="w-6 h-6 fill-black hover:fill-primary-500" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z">
                        </path>
                    </svg>
                </a>

                <button class="block md:hidden">
                    <svg class="w-7 fill-black hover:fill-primary-500" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="w-full mt-6 inline-flex justify-center">
            <img src="{{ asset('assets/annahda-logo.svg') }}" alt="Annahdha Logo" class="h-10 md:h-16">
        </div>

        <nav class="hidden md:inline-flex w-full mt-6 justify-center">
            <ul dir="rtl" class="w-fit flex items-center justify-center gap-6 font-semibold text-lg">
                @isset($header_categories)
                    @foreach ($header_categories as $item)
                        <li>
                            <a href="{{ route('category.article', ['category' => $item->id]) }}"
                                class="text-black hover:text-primary-500 dark:text-white">{{ $item->name }}</a>
                        </li>
                    @endforeach
                @endisset
            </ul>
        </nav>
    </div>
</header>
