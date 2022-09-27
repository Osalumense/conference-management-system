<div>
    <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()"
        x-init="$refs.loading.classList.add('hidden')">
        <!-- Loading screen -->
        {{-- <div x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
            <span>Loading...</span>
        </div> --}}

        <!-- Sidebar backdrop -->
        <div x-show.in.out.opacity="isSidebarOpen" class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"></div>

        <!-- Sidebar -->
        <aside x-transition:enter="transition transform duration-300"
            x-transition:enter-start="-translate-x-full opacity-30  ease-in"
            x-transition:enter-end="translate-x-0 opacity-100 ease-out"
            x-transition:leave="transition transform duration-300"
            x-transition:leave-start="translate-x-0 opacity-100 ease-out"
            x-transition:leave-end="-translate-x-full opacity-0 ease-in"
            class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform border-r bg-white shadow-lg lg:z-50 lg:static lg:shadow-none"
            :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}" x-cloak>
            <!-- sidebar header -->
            <div class="flex items-center opacity-80 justify-between flex-shrink-0 p-2"
                :class="{'lg:justify-center': !isSidebarOpen}">
                <span
                    class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap text-blue-600">
                    Event<span :class="{'lg:hidden': !isSidebarOpen}"> MS</span>
                </span>
                <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
                    <i class="bx bx-menu bx-sm"></i>
                </button>
            </div>
            <!-- Sidebar links -->
            <nav class="flex-1 my-8 overflow-hidden hover:overflow-y-auto">
                <ul class="p-2 overflow-hidden text-blue-600">
                    <li>
                        <a href="{{ url('/admin') }}"
                            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                            :class="{'justify-center relative group': !isSidebarOpen}">
                                
                            <div>
                                <span><i class="bx bx-home bx-sm"></i></span>
                                <div class="opacity-0 w-18 bg-black text-white tooltip text-xs rounded-lg py-2 absolute group-hover:opacity-100 px-1 pointer-events-none">
                                    {{ 'Dashboard' }}
                                </div>                                
                            </div>
                            
                            <span
                                :class="{ 'lg:hidden': !isSidebarOpen }">{{ 'Dashboard' }}</span>
                        </a>
                    </li>
                    {{-- @if (Auth::user()->type == \UserType::SUPER_ADMIN)
                        <li>
                            <a href="{{ url('/admin/users') }}"
                                class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                                :class="{'justify-center relative group': !isSidebarOpen}">
                                <div>
                                    <span><i class="bx bx-user bx-sm"></i></span>
                                    <div class="opacity-0 w-16 mx-auto bg-black text-white text-center tooltip text-xs rounded-lg py-2 absolute z-[99] group-hover:opacity-100 px-1 pointer-events-none">
                                        {{ trans('admin::messages.index.menu.users') }}
                                    </div>
                                    
                                </div>
                                <span
                                    :class="{ 'lg:hidden': !isSidebarOpen }">{{ trans('admin::messages.index.menu.users') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/admin-users') }}"
                                class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                                :class="{'justify-center relative group': !isSidebarOpen}">
                                <div>
                                    <span><i class="bx bx-wrench bx-sm"></i></span>
                                    <div class="opacity-0 w-16 bg-black text-white tooltip text-center text-xs rounded-lg py-2 absolute group-hover:opacity-100 px-1 pointer-events-none">
                                        {{ trans('admin::messages.index.menu.admin') }}
                                    </div> 
                                </div>
                                <span
                                    :class="{ 'lg:hidden': !isSidebarOpen }">{{ trans('admin::messages.index.menu.admin') }}</span>
                            </a>
                        </li>
                    @endif --}}
                    {{-- <li>
                        <a href="{{ url('/admin/category') }}"
                            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                            :class="{'justify-center relative group': !isSidebarOpen}">
                            <div>
                                <span><i class="bx bx-purchase-tag bx-sm"></i>
                                    <div class="opacity-0 w-16 mx-auto bg-black text-white text-center tooltip text-xs rounded-lg py-2 absolute group-hover:opacity-100 px-1 pointer-events-none">
                                        {{ trans('admin::messages.index.menu.category') }}
                                    </div>
                                </span>
                                
                            </div>
                            <span
                                :class="{ 'lg:hidden': !isSidebarOpen }">{{ trans('admin::messages.index.menu.category') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/units') }}"
                            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                            :class="{'justify-center relative group': !isSidebarOpen}">
                            <div>
                                <span><i class="bx bx-tag-alt bx-sm"></i>
                                </span>
                                <div class="opacity-0 w-16 mx-auto bg-black text-white text-center tooltip text-xs rounded-lg py-2 absolute z-[99] group-hover:opacity-100 px-1 pointer-events-none">
                                    {{ trans('admin::messages.index.menu.unit') }}
                                </div>
                            </div>
                            <span :class="{ 'lg:hidden': !isSidebarOpen }">
                                {{ trans('admin::messages.index.menu.unit') }}
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/products') }}"
                            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                            :class="{'justify-center relative group': !isSidebarOpen}">
                            <div>
                                <span>
                                <i class="bx bx-cart bx-sm"></i>
                                </span>
                                <div class="opacity-0 w-16 mx-auto bg-black text-white text-center tooltip text-xs rounded-lg py-2 absolute  group-hover:opacity-100 px-1 pointer-events-none">
                                    {{ trans('admin::messages.index.menu.products') }}
                                </div>
                            </div>
                            <span
                                :class="{ 'lg:hidden': !isSidebarOpen }">{{ trans('admin::messages.index.menu.products') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/admin/orders') }}"
                            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                            :class="{'justify-center relative group': !isSidebarOpen}">
                            <div>
                                <span>
                                <i class="bx bx-line-chart bx-sm"></i>
                                </span>
                                <div class="opacity-0 w-16 mx-auto bg-black text-white text-center tooltip text-xs rounded-lg py-2 absolute  group-hover:opacity-100 px-1 pointer-events-none">
                                    {{ trans('admin::messages.index.menu.orders') }}
                                </div>
                            </div>
                            <span
                                :class="{ 'lg:hidden': !isSidebarOpen }">{{ trans('admin::messages.index.menu.orders') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/promotion-code') }}"
                            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                            :class="{'justify-center relative group': !isSidebarOpen}">
                            <div>
                                <span>
                                <i class="bx bx-gift bx-sm"></i>
                                </span>
                                <div class="opacity-0 w-16 mx-auto bg-black text-white text-center tooltip text-xs rounded-lg py-2 absolute  group-hover:opacity-100 px-1 pointer-events-none">
                                    {{ trans('admin::messages.index.menu.promotion') }}
                                </div>
                            </div>
                            <span
                                :class="{ 'lg:hidden': !isSidebarOpen }">{{ trans('admin::messages.index.menu.promotion') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/invoice-orders') }}"
                            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                            :class="{'justify-center relative group': !isSidebarOpen}">
                            <div>
                                <span>
                                <i class='bx bx-receipt bx-sm'></i>
                                </span>
                                <div class="opacity-0 w-16 mx-auto bg-black text-white text-center tooltip text-xs rounded-lg py-2 absolute  group-hover:opacity-100 px-1 bottom-full pointer-events-none">
                                    {{ trans('admin::messages.index.menu.invoices') }}
                                </div>
                            </div>
                            <span
                                :class="{ 'lg:hidden': !isSidebarOpen }">{{ trans('admin::messages.index.menu.invoices') }}</span>
                        </a>
                    </li> --}}
                    <!-- Sidebar Links... -->
                </ul>
            </nav>
            <!-- Sidebar footer -->
            <div class="flex-shrink-0 p-2 border-t max-h-14">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring">
                        <span>
                            <i class="bx bx-sm bx-log-out" id="log-out"></i>
                        </span>
                        <span :class="{'lg:hidden': !isSidebarOpen}"> Logout </span>
                    </button>
                </form>

            </div>
        </aside>

        <div class="flex flex-col flex-1 h-full overflow-hidden">
            <!-- Navbar -->
            <header class="flex-shrink-0 border-b">
                <div class="flex items-center justify-between p-2 bg-white">
                    <!-- Navbar left -->
                    <div class="flex items-center space-x-3">
                        <span class="p-2 text-xl font-semibold  tracking-wider uppercase lg:hidden">Event</span>
                        <!-- Toggle sidebar button -->
                        <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
                            <i class="bx bx-menu bx-sm"></i>
                        </button>
                    </div>

                    <!-- Navbar right -->
                    {{-- <div class="relative flex items-center space-x-3">


                        <div class="items-center hidden space-x-3 md:flex">

                            <div class="relative" x-data="{ isOpen: false }">
                                <button @click="isOpen = !isOpen"
                                    class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
                                    <img class="object-cover w-8 h-8 rounded-full"
                                        src="{{ asset('img/avatar.jpg') }}" alt="User Profile" />
                                </button>
                                <!-- Dropdown card -->
                                <div @click.away="isOpen = false" x-show.transition.opacity="isOpen"
                                    class="absolute transform -translate-x-full bg-white rounded-md shadow-lg min-w-max">
                                    <div class="flex flex-col p-2 space-y-1 font-medium border-b">
                                        <span class="text-gray-800">{{ Auth::user()->first_name }}</span>
                                        <span class="text-sm text-gray-400">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            </header>

            <!-- Main content -->

            <main class="flex-1 max-h-full overflow-x-hidden p-5">
                @if (session('success'))
                    <div class="flex justify-center">
                        <div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 7000)"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-0"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-0"
                            class="bg-green-200 text-blue-800 px-4 py-2 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
                            <span class=" mx-auto"><i class='bx bxs-check-circle mr-2'></i>
                                {!! session('success') !!} </span>
                        </div>
                    </div>
                @endif
                @if (session('error'))
                    <div class="flex justify-center">
                        <div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 7000)"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-0"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-0"
                            class="bg-red-200 text-red-800 px-4 py-2 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
                            <span class=" mx-auto"><i class='bx bxs-x-circle mr-2'></i> {!! session('error') !!}
                            </span>
                        </div>
                    </div>
                @endif
                @if (session('warning'))
                    <div class="flex justify-center">
                        <div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 7000)"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-0"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-0"
                            class="bg-orange-200 text-yellow-600 px-4 py-2 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
                            <span class="mx-auto"><i class='bx bxs-error mr-2'></i>{!! session('warning') !!}
                            </span>
                        </div>
                    </div>
                @endif
                @if (session('info'))
                    <div class="flex justify-center">
                        <div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 7000)"
                            class="bg-blue-200 text-blue-600 px-4 py-2 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
                            <span class="mx-auto"><i class='bx bxs-error mr-2'></i> {!! session('info') !!}
                            </span>
                        </div>
                    </div>
                @endif
                <!-- Start Content -->
                @yield('content')
            </main>
            <!-- Main footer -->
            {{-- <footer class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14">
                <script>
                    document.write(new Date().getFullYear());
                </script>
        </div>
        <div class="text-sm">
            Made by
            <a class="text-blue-400 no-underline" href="https://luday.se" target="_blank">Luday</a>
        </div>
        </footer> --}}
    </div>
</div>
