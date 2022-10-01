<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PearlFive - @yield('title')</title>

    <meta name="keywords"
        content="Règlement RP, termes rp,Règles RP,Règlement PearlFive, GTA RP, GTAV RP, FIVEM, Fivem FR">
    <meta name="description" content="Règlement du serveur PearlFive, Règlement DISCORD, Règlement RP.">
    <meta name="author" content="PearlFive">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/png" href="{{ asset('img/Logo.png') }}">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lato&family=Open+Sans:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- Global site tag (gtag.js) - Google Analytics
        -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-196939407-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-196939407-1');

    </script>
    @yield('jstop')
    <style>
        .turbolinks-progress-bar {
            height: 5px;
            background-color: #D97606;
            border-radius: 5px;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;

        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #FF7805;
            border-radius: 10px;

        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #FF9B25;

        }

    </style>

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">

    @livewireStyles
    @yield('css')
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="bg-gray-900">
    <div class="header-2">

        <section class="relative py-2 bg-gray-900">
            <div class="flex items-center justify-between h-20 px-8 mx-auto max-w-7xl" x-data="{ showMenu: false }">

                <a href="{{ route('index') }}"
                    class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-white select-none">
                    PearlFive
                </a>

                <nav class="absolute top-0 left-0 z-50 flex-col items-center justify-center hidden w-full h-64 pt-5 mt-24 space-x-8 text-sm text-center text-gray-800 bg-gray-800 border-gray-200 shadow-xl rounded-2xl md:flex md:shadow-none md:w-auto md:flex-row md:h-24 lg:text-base md:bg-transparent md:mt-0 md:border-none md:py-0 md:relative"
                    :class="{'flex fixed': showMenu, 'hidden': !showMenu }">
                    <a href="{{ route('index') }}" @if (Request::is('/')) x-data="{ hover: true }"
@else
 x-data="{ hover: false }" @endif @mouseenter="hover = true" @mouseleave="hover = false"
                        class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                        <span class="block">Accueil</span>
                        <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                            <span x-show="hover"
                                class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-orange"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                x-transition:leave="transition ease-out duration-300"
                                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                style="display: none;"></span>
                        </span>
                    </a>
                    <a href="/wlip.php" target="_blank" @if (Request::is('wlip'))  x-data="{ hover: true }"
                    @else
                         x-data="{ hover: false }" @endif @mouseenter="hover = true" @mouseleave="hover = false"
                                            class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                            <span class="block">Wl ton IP</span>
                                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                                <span x-show="hover"
                                                    class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-orange"
                                                    x-transition:enter="transition ease-out duration-300"
                                                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                                    x-transition:leave="transition ease-out duration-300"
                                                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                                    style="display: none;"></span>
                                            </span>
                                        </a>
                    <a href="{{ route('rules') }}" @if (Request::is('rules')) x-data="{ hover: true }"
@else
     x-data="{ hover: false }" @endif @mouseenter="hover = true" @mouseleave="hover = false"
                        class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                        <span class="block">Réglement</span>
                        <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                            <span x-show="hover"
                                class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-orange"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                x-transition:leave="transition ease-out duration-300"
                                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                style="display: none;"></span>
                        </span>
                    </a>

                    <a href="https://top-serveurs.net/gta/PearlFiverp" target='_blank' x-data="{ hover: false }"
                        @mouseenter="hover = true" @mouseleave="hover = false"
                        class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                        <span class="block">Vote</span>
                        <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                            <span x-show="hover"
                                class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-orange"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                x-transition:leave="transition ease-out duration-300"
                                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                style="display: none;"></span>
                        </span>
                    </a>
                    @auth
                        <a href="{{ route('profile') }}" @if (Request::is('profile')) x-data="{ hover: true }"
                    @else
                             x-data="{ hover: false }" @endif @mouseenter="hover = true"
                            @mouseleave="hover = false"
                            class="relative inline-block mb-1 ml-5 text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                            <span class="block">{{ \Auth::user()->name }}</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform translate-x-0 border-t-2 border-gray-100"></span>
                            </span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span x-show="hover"
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-orange"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-out duration-300"
                                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                    style="display: none;"></span>
                            </span>
                        </a>
                        @if (\Auth::user()->players)
                            @if (\Auth::user()->players->group == 'admin' || \Auth::user()->players->group == 'superadmin')
                                <a href="{{ route('dashboard-index') }} " target='_blank'
                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap border rounded-md shadow-sm border-orange-dark bg-orange focus:ring-offset-gray-900 hover:bg-orange-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-dark">
                                    Admin
                                </a>
                            @endif
                            @if (\Auth::user()->canSeeDashboard() && !(\Auth::user()->players->group == 'admin' || \Auth::user()->players->group == 'superadmin'))
                                <a href="{{ route('dashboard-index') }} " target='_blank'
                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap border rounded-md shadow-sm border-orange-dark bg-orange focus:ring-offset-gray-900 hover:bg-orange-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-dark">
                                    Admin
                                </a>
                            @endif
                        @endif


                    @else
                        <a href="{{ route('login') }}" x-data="{ hover: false }" @mouseenter="hover = true"
                            @mouseleave="hover = false"
                            class="relative inline-block ml-5 text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                            <span class="block">Se connecter</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform translate-x-0 border-t-2 border-gray-100"></span>
                            </span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                <span x-show="hover"
                                    class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-orange"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transition ease-out duration-300"
                                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                    style="display: none;"></span>
                            </span>
                        </a>
                    @endauth
                </nav>

                <!-- Mobile Button -->
                <div @click="showMenu = !showMenu"
                    class="absolute top-0 right-0 z-50 block w-6 mt-8 mr-10 cursor-pointer select-none md:hidden sm:mt-10">
                    <span class="block w-full h-1 mt-2 duration-200 transform bg-gray-800 rounded-full sm:mt-1"></span>
                    <span class="block w-full h-1 mt-1 duration-200 transform bg-gray-800 rounded-full"></span>
                </div>

            </div>
        </section>

    </div>
    @include('sweetalert::alert')
    @yield('content')


    <section class="py-10">
        <div class="px-10 mx-auto max-w-7xl">
            <div class="flex flex-col items-center md:flex-row md:justify-between">
                <a href="{{ route('index') }}"
                    class="flex items-center justify-center w-10 h-10 mr-3 rounded-lg mb-7">
                    <img src="{{ asset('img/Logo.png') }}">
                </a>

                <div class="flex flex-row justify-center mb-4 -ml-4 -mr-4"> <a
                        href="https://www.youtube.com/channel/UCdbyQtWCJ7fe3FNNwzDh75Q" target="_blank"
                        class="p-4 text-gray-700 hover:text-gray-400">
                        <i class="mr-2 fab fa-youtube"></i>
                    </a>
                    <a href="https://discord.gg/88KgWkCHwa" target="_blank"
                        class="p-4 text-gray-700 hover:text-gray-400">
                        <i class="mr-2 fab fa-discord"></i>
                    </a> <a href="https://twitter.com/PearlFiveRP1" target="_blank"
                        class="p-4 text-gray-700 hover:text-gray-400"> <i class="fab fa-twitter"></i> </a>
                </div>
            </div>
            <div class="flex flex-col justify-between text-center md:flex-row">
                <p class="order-last text-sm leading-tight text-white md:order-first">Copyright © PearlFive Tous droits
                    réservés. Built with ❤️ by <a href="https://blackburn-co.com" target="_blank"> Blackburn</a> & <a href="https://github.com/HichamBelhamiti" target="_blank">Dimax</a>. </p>
                <ul class="flex flex-row justify-center pb-3 -ml-4 -mr-4 text-sm">
                    <li> <a href="{{ route('index') }}" class="px-4 text-white hover:text-white">Accueil</a> </li>
                    <li> <a href="/wlip.php" class="px-4 text-white hover:text-white">WL TON IP</a>
                    </li>
                    <li> <a href="{{ route('rules') }}" class="px-4 text-white hover:text-white">Réglement</a> </li>

                    <li> <a href="https://top-serveurs.net/gta/PearlFiverp" target='_blank'
                            class="px-4 text-white hover:text-white">Vote</a></li>
                </ul>
            </div>
        </div>
    </section>
    @if (session('error'))
        <div class="absolute top-0 right-0 px-4 py-3 mt-16 mr-8 text-red-900 bg-white border-t-4 border-red-500 shadow-md font-opensans rounded-2xl-b"
            onclick="this.remove()" id="alert-error" role="alert">
            <div class="flex">
                <div class="py-1">
                    <svg class="w-6 h-6 mr-4 text-red-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold">Une erreur est survenu...</p>
                    <p class="text-sm">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if (session('success'))
        <div class="absolute top-0 right-0 px-4 py-3 mt-16 mr-8 text-green-900 bg-white border-t-4 border-green-500 shadow-md font-opensans rounded-2xl-b"
            onclick="this.remove()" id="alert-success" role="alert">
            <div class="flex items-center">
                <div class="py-1">
                    <svg class="w-6 h-6 mr-4 text-green-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="absolute top-0 right-0 px-4 py-3 mt-16 mr-8 text-red-900 bg-white border-t-4 border-red-500 shadow-md rounded-2xl-b"
            onclick="this.remove()" id="alert-error" role="alert">
            <div class="flex">
                <div class="py-1">
                    <svg class="w-6 h-6 mr-4 text-red-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold">Une erreur est survenu...</p>
                    <p class="text-sm">
                        {{ implode(', ', $errors->all()) }}
                    </p>
                </div>
            </div>
        </div>
    @endif


    @stack('js')

    <script>
        @if (session('error'))
            setTimeout(function () {
            document.getElementById('alert-error').remove();
            }, 5000);
        @endif

        @if (session('success'))
            setTimeout(function () {
            document.getElementById('alert-success').remove();
            }, 5000);
        @endif

    </script>
</body>

@yield('js')

</html>
