@extends('layouts.error')

@section('title', 'Maintenance')
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
                            class="absolute bottom-0 left-0 inline-block w-full h-4 mb-1 -ml-1 transform -skew-x-3 bg-red"></span>
                        <span class="relative text-white">Maintenance</span>
                    </span>
                </h1>
                <p class="z-20 block mt-6 text-base text-white xl:text-lg sm:text-center lg:text-left">
                    Nous somme en Maintenance                

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
@endsection