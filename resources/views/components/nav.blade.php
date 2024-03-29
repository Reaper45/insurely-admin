 <nav class="bg-white border border-gray-300 border-solid border-1 border-t-0 border-l-0 border-r-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('insurers') }}" >
                        <img class="h-8" src="{{ asset('img/logo.png') }}" alt="Workflow logo" />
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline">
                        <a href="{{ route('insurers') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-500 hover:text-white hover:text-gray-700 focus:text-blue-800 nav-item" id="nav-item-patners">Patners</a>
                        <a href="{{ route('products') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-500 hover:text-white hover:text-gray-700 focus:text-blue-800 nav-item" id="nav-item-products">Products</a>
                        <a href="{{ route('benefits') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-500 hover:text-white hover:text-gray-700 focus:text-blue-800 nav-item" id="nav-item-benefits">Benefits</a>
                        <a href="{{ route('settings') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-500 hover:text-white hover:text-gray-700 focus:text-blue-800 nav-item" id="nav-item-settings">Settings</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    {{-- <button class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700" aria-label="Notifications">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    </button> --}}

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <div  class="max-w-xs flex items-center text-sm rounded-full text-grey font-medium focus:outline-none" id="user-menu" aria-label="User menu" aria-haspopup="true">
                                {{ Auth::user()->name}}
                                <a
                                    class="block px-3 py-1 ml-4 rounded text-sm text-blue-700 bg-blue-100"
                                    role="menuitem"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                    Sign out
                                </a>
                                {{-- <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" /> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!--
    Mobile menu, toggle classes based on menu state.

    Open: "block", closed: "hidden"
    -->
    <div class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 sm:px-3">
            <a href="{{ route('products') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-blue-900 focus:outline-none focus:text-white focus:bg-blue-700">Products</a>
            <a href="{{ route('insurers') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-blue-900 focus:outline-none focus:text-white focus:bg-blue-700">Insurers</a>
            <a href="{{ route('settings') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-blue-900 focus:outline-none focus:text-white focus:bg-blue-700">Settings</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                </div>
                @auth
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                        <div class="mt-1 text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                @endauth
            </div>
            <div class="mt-3 px-2">
            <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Sign out</a>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>
    