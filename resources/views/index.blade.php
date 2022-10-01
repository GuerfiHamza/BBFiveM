@extends('layouts.app')

@section('title', 'Accueil')

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://unpkg.com/pattern.css" />
@endpush


@section('content')
    <div class="h-full max-h-screen py-8 md:py-36 hero">

        <section class="flex flex-col items-center justify-center py-2 bg-cover md:py-2 lg:py-2 min-w-screen tails-bg">
            <div class="flex flex-col items-center justify-center p-10 mx-auto lg:flex-row lg:max-w-6xl lg:p-0">
                <div
                    class="container z-20 flex flex-col w-full px-5 pr-12 mb-16 text-2xl text-white lg:w-1/2 sm:px-0 md:px-10 sm:items-center lg:items-start lg:mb-0">
                    <h1
                        class="z-20 font-sans text-4xl font-extrabold leading-none text-white sm:text-5xl xl:text-6xl sm:text-center lg:text-left">
                        <span class="relative">
                            <span
                                class="absolute bottom-0 left-0 inline-block w-full h-4 mb-1 -ml-1 transform -skew-x-3 bg-red-light"></span>
                            <span class="relative">PearlFive,</span>
                        </span>
                        <span class="relative block text-red-light">Nouvelle vie.</span>
                    </h1>
                    <p class="z-20 block mt-6 text-base text-white xl:text-lg sm:text-center lg:text-left">Rejoins notre
                        serveur, ta ville, PearlFive !
                        <br>Un serveur a l'image de ses joueurs.
                        <br> Tu veux découvrir ces promesses et commencer ton histoire avec nous ? Alors rejoins nous !

                    </p>
                    <div class="flex items-center mt-10 ">
                            <div class="grid gap-8 items-start justify-center">
                              <div class="relative group">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-light to-red-dark rounded-lg blur-lg "> </div>
                                <a class="relative px-7 py-4 hover:shadow-3xl bg-black rounded-lg leading-none flex items-center divide-x divide-gray-600 duration-500 transition-shadow" href="https://discord.gg/kTPFjXD36Q" target="_blank">
                                 Discord
                                </a>
                              </div>
                            </div>
                    </div>
                </div>
                <div
                    class="invisible w-full px-8 mb-12 rounded-lg cursor-pointer md:visible md:px-0 lg:mb-0 lg:pl-10 md:w-2/3 lg:w-1/2 group">
                    <div class="rounded-md ">
                        <img src="{{ asset('img/Logo.png') }}" class="object-cover w-full h-full ">
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div
        class="px-4 py-16 mx-auto border-2 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20 border-red rounded-xl">
        <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
            <div>
                <p
                    class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider uppercase bg-white rounded-full text-red">
                    Rejoignez-nous
                </p>
            </div>
            <h2
                class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-white sm:text-4xl md:mx-auto">
                <span class="relative inline-block">
                    <svg viewBox="0 0 52 24" fill="#FF0000"
                        class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 white lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                        <defs>
                            <pattern id="f51618fb-0edb-4bcb-b35a-ffc770941286" x="0" y="0" width=".135" height=".30">
                                <circle cx="1" cy="1" r=".7"></circle>
                            </pattern>
                        </defs>
                        <rect fill="url(#f51618fb-0edb-4bcb-b35a-ffc770941286)" width="52" height="24"></rect>
                    </svg>
                    <span class="relative">Comment </span>
                </span>
                faire ?
            </h2>
        </div>
        <div class="grid gap-8 row-gap-0 lg:grid-cols-3">
            <div class="relative text-center">
                <div
                    class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-red-light sm:w-20 sm:h-20">
                    <svg class="w-12 h-12 text-white sm:w-16 sm:h-16" stroke="currentColor" viewBox="0 0 52 52">
                        <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"
                            points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                    </svg>
                </div>
                <h6 class="mb-2 text-2xl font-extrabold text-white">Étape 1</h6>
                <p class="max-w-md mb-3 text-sm text-white sm:mx-auto">
                    Whitelist ton IP.
                </p>
                <a href="/wlip.php" target="_blank"
                    class="inline-flex items-center font-semibold text-white transition-colors duration-500 ease-in hover:text-red">Whitelister
                    ton IP</a>
                <div class="top-0 right-0 flex items-center justify-center h-24 lg:-mr-8 lg:absolute">
                    <svg class="w-8 text-white transform rotate-90 lg:rotate-0" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <line fill="none" stroke-miterlimit="10" x1="2" y1="12" x2="22" y2="12"></line>
                        <polyline fill="none" stroke-miterlimit="10" points="15,5 22,12 15,19 "></polyline>
                    </svg>
                </div>
            </div>
            <div class="relative text-center">
                <div
                    class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-red-light sm:w-20 sm:h-20">
                    <svg class="w-12 h-12 text-white sm:w-16 sm:h-16" stroke="currentColor" viewBox="0 0 52 52">
                        <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"
                            points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                    </svg>
                </div>
                <h6 class="mb-2 text-2xl font-extrabold text-white">Étape 2</h6>
                <p class="max-w-md mb-3 text-sm text-white sm:mx-auto">
                    Télécharge Teamspeak & SaltyChat.
                </p>
                <a href="https://www.teamspeak.com/fr/" target="_blank"
                    class="inline-flex items-center font-semibold text-white transition-colors duration-500 ease-in yourlink hover:text-red">Télécharger
                    TeamSpeak</a>
                <p>
                    <a href="https://www.saltmine.de/saltychat/download/stable" target="_blank"
                        class="inline-flex items-center font-semibold text-white transition-colors duration-500 ease-in yourlink hover:text-red">Télécharger
                        SaltyChat</a>
                </p>
                <div class="top-0 right-0 flex items-center justify-center h-24 lg:-mr-8 lg:absolute">
                    <svg class="w-8 text-white transform rotate-90 lg:rotate-0" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <line fill="none" stroke-miterlimit="10" x1="2" y1="12" x2="22" y2="12"></line>
                        <polyline fill="none" stroke-miterlimit="10" points="15,5 22,12 15,19 "></polyline>
                    </svg>
                </div>
            </div>
            <div class="relative text-center">
                <div
                    class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-red-light sm:w-20 sm:h-20">
                    <svg class="w-12 h-12 text-white sm:w-16 sm:h-16" stroke="currentColor" viewBox="0 0 52 52">
                        <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"
                            points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                    </svg>
                </div>
                <h6 class="mb-2 text-2xl font-extrabold text-white">Étape 3</h6>
                <p class="max-w-md mb-3 text-sm text-white sm:mx-auto">
                    Ouvre FiveM et connecte toi !
                </p>

                <a target="_blank"
                    class="inline-flex items-center font-semibold text-white transition-colors duration-500 ease-in hover:text-red">connect
                    cfx.re/join/g4vpd9</a>


            </div>

        </div>
    </div>

    <div>

        <section class="pt-20 pb-32">
            <div class="px-20 mx-auto max-w-7xl">
                <h2 class="mb-1 text-3xl font-extrabold leading-tight text-white">Points forts</h2>
                <p class="mb-16 text-lg text-white">Voici quelques point a retenir pour un petit aperçu de la qualité du
                    serveur</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-16 lg:gap-x-24 gap-y-20">


                    <div>
                        <div class="flex items-center justify-center w-12 h-12 mb-4 bg-gray-900 rounded-full text-red">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Calque_1" data-name="Calque 1"
                                viewBox="0 0 141.73 141.73">
                                <defs>
                                    <style>
                                        .cls-1,
                                        .cls-2 {
                                            fill: #fff;
                                        }

                                        .cls-2 {
                                            stroke: #ee771e;
                                            stroke-miterlimit: 10;
                                            stroke-width: 7px;
                                        }

                                    </style>
                                </defs>
                                <rect class="cls-1" x="37.56" y="100.6" width="66.61" height="6.59" />
                                <path class="cls-2"
                                    d="M93.22,46.31c0,.47,0,.89,0,1.32-.09,2.46-.17,4.92-.3,7.39a55.11,55.11,0,0,1-.78,8.1A44.91,44.91,0,0,1,88.4,74.66a39.7,39.7,0,0,1-9.83,12.81c-1,.87-2,1.8-3.15,2.59a21.17,21.17,0,0,1-4.3,2.5,1,1,0,0,1-.87-.12,24.72,24.72,0,0,1-4.53-2.83,55.26,55.26,0,0,1-6-5.45,45.74,45.74,0,0,1-4.21-5.67,43.8,43.8,0,0,1-5.84-15,46.1,46.1,0,0,1-.77-7c-.17-2.86-.25-5.73-.38-8.59,0-.22,0-.45,0-.68,0-.88,0-.86.87-1a89.18,89.18,0,0,0,9.17-1.72A60.06,60.06,0,0,0,70.26,39.7a1.26,1.26,0,0,1,1.27,0,64.49,64.49,0,0,0,10.59,4.41A60.6,60.6,0,0,0,90,45.76C91.08,45.93,92.15,46.13,93.22,46.31ZM50,50.93H50c.09,1.85.19,3.7.27,5.55A44.24,44.24,0,0,0,51.58,66a40.86,40.86,0,0,0,3.68,9.75,42.54,42.54,0,0,0,5.2,7.5,54.11,54.11,0,0,0,5.28,4.88A25.4,25.4,0,0,0,70.15,91a1.14,1.14,0,0,0,1.13,0,22,22,0,0,0,4.49-2.81,41.39,41.39,0,0,0,6.33-6.08A39.5,39.5,0,0,0,89.73,67.2a40.89,40.89,0,0,0,1.4-7.76c.08-1.41.19-2.82.25-4.23.11-2.5.19-5,.29-7.51,0-.24-.1-.32-.31-.36l-3.19-.56A47.81,47.81,0,0,1,80.25,45a64.56,64.56,0,0,1-9-3.89.93.93,0,0,0-.94,0c-.9.47-1.81.91-2.72,1.35a45,45,0,0,1-13.25,4.21c-1.36.2-2.7.46-4,.68-.28,0-.37.17-.37.45C50,48.82,50,49.88,50,50.93Z" />
                                <path class="cls-1"
                                    d="M69.62,52h2.49L80,72.75H75.83l-5-14.17-5,14.17H61.69ZM65.5,65.65H76.42v3.77H65.5Z" />
                            </svg>
                        </div>
                        <h3 class="mb-2 text-base font-semibold leading-tight text-white lg:text-lg">Anti-Cheat</h3>
                        <p class="text-sm text-white lg:text-base">Grace a notre système puissant, les cheateurs et moddeurs
                            se font rares pour le bon déroulement de votre RP.</p>
                    </div>

                    <div>
                        <div
                            class="flex items-center justify-center w-12 h-12 mb-4 text-indigo-600 bg-gray-900 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Calque_1" data-name="Calque 1"
                                viewBox="0 0 141.73 141.73">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fff;
                                        }

                                        .cls-2 {
                                            fill: #ee771e;
                                        }

                                    </style>
                                </defs>
                                <rect class="cls-1" x="37.56" y="99.97" width="66.61" height="6.59" />
                                <path class="cls-2"
                                    d="M39.2,48.8h7.3V87.61H39.2ZM42.1,65H55.6a3.55,3.55,0,0,0,2-.56,3.68,3.68,0,0,0,1.32-1.6,6.05,6.05,0,0,0,.49-2.41,5.87,5.87,0,0,0-.46-2.4,3.68,3.68,0,0,0-1.32-1.6,3.6,3.6,0,0,0-2-.56H42.1v-7H56.18a10.82,10.82,0,0,1,5.63,1.44,9.74,9.74,0,0,1,3.76,4.07,14.53,14.53,0,0,1,0,12.19,9.7,9.7,0,0,1-3.77,4.07A10.86,10.86,0,0,1,56.18,72H42.1Zm8.16,5.84,7.82-1.23,10.45,18H59.68Z" />
                                <path class="cls-2"
                                    d="M74.8,48.83h7.31V87.61H74.8Zm3.33,16.7H90.54a4.36,4.36,0,0,0,2.3-.6,4.08,4.08,0,0,0,1.56-1.7A5.34,5.34,0,0,0,95,60.72a5.71,5.71,0,0,0-.54-2.54,4,4,0,0,0-1.55-1.71,4.47,4.47,0,0,0-2.33-.6H78.13v-7H90.35a13.28,13.28,0,0,1,6.39,1.48A10.61,10.61,0,0,1,101,54.48,13.55,13.55,0,0,1,101,67a10.5,10.5,0,0,1-4.28,4.15,13.39,13.39,0,0,1-6.39,1.47H78.13Z" />
                            </svg>
                        </div>
                        <h3 class="mb-2 text-base font-semibold leading-tight text-white lg:text-lg">RP</h3>
                        <p class="text-sm text-white lg:text-base">Vu notre Whitelist IP & Teamspeak, cela décourage les
                            trolls & assure un RP général de haute qualité.</p>
                    </div>

                    <div>
                        <div class="flex items-center justify-center w-12 h-12 mb-4 text-pink-600 bg-gray-900 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Calque_1" data-name="Calque 1"
                                viewBox="0 0 141.73 141.73">
                                <defs>
                                    <style>
                                        .cls-1,
                                        .cls-2 {
                                            fill: #fff;
                                        }

                                        .cls-2 {
                                            stroke: #ee771e;
                                            stroke-miterlimit: 10;
                                            stroke-width: 7px;
                                        }

                                    </style>
                                </defs>
                                <rect class="cls-1" x="37.56" y="99.93" width="66.61" height="6.59" />
                                <path class="cls-2"
                                    d="M93.22,45.64c0,.47,0,.89,0,1.31-.09,2.47-.17,4.93-.3,7.39a55.25,55.25,0,0,1-.78,8.11A45,45,0,0,1,88.4,74a39.6,39.6,0,0,1-9.83,12.81c-1,.87-2,1.8-3.15,2.6a20.68,20.68,0,0,1-4.3,2.49,1,1,0,0,1-.87-.11,24.72,24.72,0,0,1-4.53-2.83,55.26,55.26,0,0,1-6-5.45,45.74,45.74,0,0,1-4.21-5.67,43.93,43.93,0,0,1-5.84-15,46.1,46.1,0,0,1-.77-7c-.17-2.85-.25-5.72-.38-8.58,0-.23,0-.45,0-.68,0-.89,0-.87.87-1a89.18,89.18,0,0,0,9.17-1.72A60.06,60.06,0,0,0,70.26,39a1.28,1.28,0,0,1,1.27,0,64.49,64.49,0,0,0,10.59,4.41A60.6,60.6,0,0,0,90,45.08C91.08,45.25,92.15,45.45,93.22,45.64ZM50,50.26H50c.09,1.85.19,3.7.27,5.55a44.24,44.24,0,0,0,1.28,9.51,40.86,40.86,0,0,0,3.68,9.75,42.54,42.54,0,0,0,5.2,7.5,54.11,54.11,0,0,0,5.28,4.88,25.35,25.35,0,0,0,4.41,2.85,1.14,1.14,0,0,0,1.13,0,22.41,22.41,0,0,0,4.49-2.81,41.39,41.39,0,0,0,6.33-6.08,39.64,39.64,0,0,0,7.63-14.92,41,41,0,0,0,1.4-7.76c.08-1.41.19-2.82.25-4.23.11-2.5.19-5,.29-7.51,0-.24-.1-.32-.31-.36-1.07-.18-2.12-.39-3.19-.56a49.92,49.92,0,0,1-7.92-1.81,64.56,64.56,0,0,1-9-3.89.93.93,0,0,0-.94,0c-.9.46-1.81.91-2.72,1.35A45.34,45.34,0,0,1,54.39,46c-1.36.2-2.7.46-4,.68-.28.05-.37.17-.37.45C50,48.15,50,49.2,50,50.26Z" />
                                <path class="cls-1"
                                    d="M68,71.78a11.57,11.57,0,0,1-2.59-.85,9.62,9.62,0,0,1-2.16-1.35L65,66.45a8.68,8.68,0,0,0,2.69,1.48,9.83,9.83,0,0,0,3.13.52,5.49,5.49,0,0,0,2.88-.63,2,2,0,0,0,1-1.78v0a1.76,1.76,0,0,0-.45-1.27A2.8,2.8,0,0,0,73,64.06a14.11,14.11,0,0,0-1.89-.4l-.07,0H71l-.3,0a19,19,0,0,1-3.35-.8,5,5,0,0,1-2.26-1.67,5.46,5.46,0,0,1-.93-3.4v0A6.12,6.12,0,0,1,65,54.37a5.56,5.56,0,0,1,2.54-2.12,10.9,10.9,0,0,1,6.22-.47A11.19,11.19,0,0,1,76,52.5,12.4,12.4,0,0,1,78,53.63l-1.61,3.21A10,10,0,0,0,74,55.6a7.21,7.21,0,0,0-2.43-.45,5.31,5.31,0,0,0-2.7.58,1.79,1.79,0,0,0-1,1.61v0a1.82,1.82,0,0,0,.5,1.37,2.84,2.84,0,0,0,1.23.74,17.89,17.89,0,0,0,2.06.5l.11,0,.11,0,.16,0,.16,0a17,17,0,0,1,3.19.91,5,5,0,0,1,2.14,1.72,5.41,5.41,0,0,1,.86,3.23v0a5.85,5.85,0,0,1-.9,3.29,5.57,5.57,0,0,1-2.62,2.09,10.74,10.74,0,0,1-4.15.72A13.23,13.23,0,0,1,68,71.78Z" />
                            </svg>
                        </div>
                        <h3 class="mb-2 text-base font-semibold leading-tight text-white lg:text-lg">Staff</h3>
                        <p class="text-sm text-white lg:text-base">Les modérateurs & les développeurs sont la pour assister
                            les joueurs et offrir une expérience de jeu optimale.</p>
                    </div>

                </div>
            </div>
        </section>
    </div>
    {{-- <section >
        <div class="px-8 py-8 mx-auto sm:py-10 lg:py-20 max-w-7xl">
            <div class="relative py-6 overflow-hidden rounded-lg bg-gradient-to-r from-red to-gray-900 lg:py-12 md:px-6 lg:p-16 lg:flex lg:items-center lg:justify-between md:shadow-xl md:bg-purple-1000">
                <div class="absolute top-0 right-0 hidden w-full -mt-20 transform rotate-45 translate-x-1/2 bg-white sm:block h-96 opacity-5"></div>
                <div class="absolute top-0 left-0 hidden w-full -mt-20 transform rotate-45 -translate-x-1/2 bg-pink-300 sm:block h-96 opacity-5"></div>
                <div class="relative p-6 rounded-lg md:p-0 md:pb-4">
                    <h2 class="text-3xl font-extrabold leading-9 tracking-tight text-white sm:text-4xl sm:leading-10">WeazelNews.</h2>
                    <p class="w-full mt-5 text-base leading-6 text-pink-100 md:w-3/4">Reste a jour et informé sur les événements qui se passent en ville grace au WeazelNews !</p>
                </div>
                <div class="relative flex flex-col items-center w-full px-6 space-y-5 md:space-x-5 md:space-y-0 md:flex-row md:w-auto lg:flex-shrink-0 md:px-0">
                    <a href="{{ route('weazel') }}" class="block w-full px-5 py-3 text-base font-medium leading-6 text-center transition duration-150 ease-in-out bg-purple-100 rounded-md text-red md:inline-flex md:shadow md:w-auto hover:bg-white focus:outline-none focus:shadow-outline">Articles</a>
                </div>
            </div>
        </div>
    </section> --}}
    <section
        class="relative flex flex-col items-center justify-center w-full px-6 py-24 bg-cover lg:py-32 min-w-screen">
        <div class="flex flex-col items-center justify-center mx-auto sm:p-6 xl:p-8 lg:flex-row lg:max-w-6xl lg:p-0">
            <div
                class="container relative z-20 flex flex-col w-full px-5 pb-1 pr-12 mb-16 text-2xl text-white lg:w-1/2 sm:pr-0 md:pr-6 md:pl-0 lg:pl-5 xl:pr-10 sm:items-center lg:items-start lg:mb-0">
                <h1
                    class="relative z-20 text-5xl font-extrabold leading-none uppercase text-red xl:text-6xl sm:text-center lg:text-left">
                    Un avant<br>
                    <span class="mt-1 text-white lg:mt-0">Gout</span>
                </h1>
                <p class="relative z-20 block mt-6 text-base text-white xl:text-xl sm:text-center lg:text-left">Voici un
                    petit trailer pour un aperçu du gameplay et une immersion totale !</p>
                
            </div>
            <div class="relative w-full px-5 rounded-lg cursor-pointer lg:w-1/2 group xl:px-0">
                <div class="absolute top-0 left-0 w-11/12 -mt-20 opacity-50">
                    <svg class="w-full h-full ml-4 text-white" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor"
                            d="M45,-78C58.3,-70.3,69,-58.2,75.2,-44.4C81.3,-30.7,82.9,-15.3,83.5,0.4C84.2,16,83.8,32.1,76.5,43.9C69.2,55.7,55.1,63.3,41.2,69.4C27.3,75.4,13.6,80,-0.7,81.2C-15.1,82.5,-30.1,80.3,-41.2,72.6C-52.2,64.9,-59.2,51.6,-67.1,38.5C-75.1,25.5,-83.9,12.8,-83.8,0C-83.8,-12.7,-74.9,-25.4,-65.8,-36.4C-56.7,-47.4,-47.4,-56.7,-36.4,-65.7C-25.4,-74.7,-12.7,-83.5,1.6,-86.2C15.9,-89,31.8,-85.7,45,-78Z"
                            transform="translate(100 100)"></path>
                    </svg>
                </div>
                <a href="https://www.youtube.com/watch?v=EkHidJTE5Bo" target="_blank">

                    <div class="relative overflow-hidden rounded-md shadow-2xl cursor-pointer group">
                        <div class="absolute flex items-center justify-center w-full h-full">
                            <span class="flex items-center justify-center w-20 h-20 rounded-full shadow-2xl bg-red">
                                <svg class="w-auto h-8 ml-1 text-white fill-current" viewBox="0 0 52 66"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M50 30.7L4.1.6C2.6-.4.8.9.8 2.9v60.3c0 2 1.8 3.3 3.3 2.3L50 35.3c1.5-1 1.5-3.6 0-4.6z"
                                        fill-rule="nonzero"></path>
                                </svg>
                            </span>
                        </div>
                        <img src="{{ asset('img/Logo.png') }}" class="z-10 object-cover w-full h-full">
                    </div>
                </a>

            </div>
        </div>
    </section>

@endsection

@push('js')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   
@endpush
