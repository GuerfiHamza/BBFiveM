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
            background-color: #FF0000;
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
            background: #A60306;
            border-radius: 10px;

        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #FF0000;

        }

    </style>

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
<script data-ad-client="ca-pub-5188850040092609" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    @livewireStyles
    @yield('css')
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="bg-black">
    

    @include('sweetalert::alert')
    @yield('content')


 
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
