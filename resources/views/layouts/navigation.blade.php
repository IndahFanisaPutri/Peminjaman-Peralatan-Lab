<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">


            <div class="flex">


                <!-- Logo -->

                <div class="shrink-0 flex items-center">

                    <a href="{{ route('dashboard') }}">

                        <x-application-logo
                            class="block h-9 w-auto fill-current text-gray-800" />

                    </a>

                </div>




                <!-- MENU DESKTOP -->

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">



                    <!-- Dashboard -->

                    <x-nav-link

                        :href="route('dashboard')"

                        :active="request()->routeIs('dashboard')">


                        Dashboard


                    </x-nav-link>







                    <!-- Data Alat -->

                    @if(auth()->user()->role == 'admin')


                    <x-nav-link

                        :href="route('alat.index')"

                        :active="request()->routeIs('alat.*')">


                        Data Alat


                    </x-nav-link>


                    @endif







                    <!-- Peminjaman -->


                    <x-nav-link

                        :href="route('peminjaman.index')"

                        :active="request()->routeIs('peminjaman.*')">


                        Peminjaman


                    </x-nav-link>







                    <!-- Servis Alat -->


                    @if(auth()->user()->role == 'admin')


                    <x-nav-link

                        :href="route('servis.index')"

                        :active="request()->routeIs('servis.*')">


                        Servis Alat


                    </x-nav-link>


                    @endif








                    <!-- Laporan -->



                    <x-nav-link

                        :href="route('laporan.index')"

                        :active="request()->routeIs('laporan.*')">


                        Laporan


                    </x-nav-link>





                </div>

            </div>









            <!-- USER DROPDOWN -->


            <div class="hidden sm:flex sm:items-center sm:ms-6">


                <x-dropdown align="right" width="48">


                    <x-slot name="trigger">


                        <button class="inline-flex items-center px-3 py-2">


                            <div>

                                {{ Auth::user()->name }}

                            </div>



                            <div class="ms-1">


                                <svg

                                    class="fill-current h-4 w-4"

                                    viewBox="0 0 20 20">


                                    <path

                                        fill-rule="evenodd"

                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />


                                </svg>


                            </div>



                        </button>


                    </x-slot>





                    <x-slot name="content">


                        <!-- Profile -->


                        <x-dropdown-link

                            :href="route('profile.edit')">


                            Profile


                        </x-dropdown-link>







                        <!-- Logout -->


                        <form method="POST"

                            action="{{ route('logout') }}">


                            @csrf



                            <x-dropdown-link

                                :href="route('logout')"

                                onclick="event.preventDefault();
                            this.closest('form').submit();">


                                Logout


                            </x-dropdown-link>



                        </form>


                    </x-slot>


                </x-dropdown>


            </div>









            <!-- MOBILE BUTTON -->


            <div class="-me-2 flex items-center sm:hidden">


                <button

                    @click="open = ! open"

                    class="inline-flex items-center justify-center p-2">


                    <svg

                        class="h-6 w-6"

                        stroke="currentColor"

                        fill="none"

                        viewBox="0 0 24 24">



                        <path

                            :class="{'hidden': open, 'inline-flex': ! open}"

                            class="inline-flex"

                            stroke-linecap="round"

                            stroke-linejoin="round"

                            stroke-width="2"

                            d="M4 6h16M4 12h16M4 18h16" />





                        <path

                            :class="{'hidden': ! open, 'inline-flex': open}"

                            class="hidden"

                            stroke-linecap="round"

                            stroke-linejoin="round"

                            stroke-width="2"

                            d="M6 18L18 6M6 6l12 12" />



                    </svg>


                </button>


            </div>



        </div>


    </div>









    <!-- RESPONSIVE MENU -->


    <div

        :class="{'block': open, 'hidden': ! open}"

        class="hidden sm:hidden">



        <div class="pt-2 pb-3 space-y-1">






            <!-- Dashboard -->

            <x-responsive-nav-link

                :href="route('dashboard')">


                Dashboard


            </x-responsive-nav-link>








            <!-- Data Alat -->

            @if(auth()->user()->role == 'admin')


            <x-responsive-nav-link

                :href="route('alat.index')">


                Data Alat


            </x-responsive-nav-link>


            @endif







            <!-- Peminjaman -->


            <x-responsive-nav-link

                :href="route('peminjaman.index')">


                Peminjaman


            </x-responsive-nav-link>







            <!-- Servis -->


            @if(auth()->user()->role == 'admin')


            <x-responsive-nav-link

                :href="route('servis.index')">


                Servis Alat


            </x-responsive-nav-link>


            @endif







            <!-- Laporan -->

            @if(auth()->user()->role == 'admin')

            <x-nav-link
                :href="route('laporan.index')"
                :active="request()->routeIs('laporan.*')">

                Laporan

            </x-nav-link>

            @endif


            @if(auth()->user()->role == 'admin')

            <x-responsive-nav-link
                :href="route('laporan.index')">

                Laporan

            </x-responsive-nav-link>

            @endif





        </div>


    </div>




</nav>