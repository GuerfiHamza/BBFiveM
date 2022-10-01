@extends('layouts.app')
 @section('title', 'Profile')
  @section('content')


<div class="container mx-auto">
    @if (isset($players))
    <div class="gap-8 md:flex">
        <div class="mb-8 text-center md:w-1/5 md:mb-0">
            <img class="w-48 h-48 mx-auto -mb-24 rounded-full" src="{{ \Auth::user()->avatar }}" alt="Avatar Jacky" />
            <div class="px-8 pt-32 text-gray-400 bg-gray-900 rounded-lg shadow-lg pb-9">
                <h3 class="mb-3 text-xl text-white font-title">
                    {{ $players->firstname }} {{ $players->lastname }}
                </h3>
                <p class="mb-2 font-body">
                    DDN: {{ $players->dateofbirth }}
                </p>
                <p class="mb-2 text-sm font-body">
                    Sexe: {{ $players->getSex() }}
                </p>
                <p class=" font-body">
                    Taille: {{ $players->getHeight() }}
                </p>

            </div>
        </div>
        <div class=" md:w-full">
            <div class="flex flex-wrap -mx-4 overflow-hidden sm:-mx-3 md:-mx-2 lg:-mx-2 xl:-mx-3">
                <div class="w-full overflow-hidden ">

                    <div class="w-48 h-48 mx-auto -mb-24 rounded-full"></div>
                    <div class="px-8 pb-10 text-white bg-gray-900 rounded-lg shadow-lg h-72">
                        <p class="pt-5 mb-3 text-md font-title">
                            <i class="w-6 h-6 far fa-building"></i>
                            Entreprise: {{ $players->getJob()->label ?? 'Chômeur'}} - {{ $players->getJobGrade()->label ?? 'RSA'}}
                        </p>
                        <p class="mb-3 text-md font-title">
                            <i class="w-6 h-6 fas fa-ban"></i>
                           Organisation / Gang: {{ $players->getOrg()->label ?? 'Chômeur'}} - {{ $players->getOrgGrade()->label ?? 'Neutre'}}
                        </p>
                        <p class="mb-3 text-md font-title">
                            <i class="w-6 h-6 fas fa-phone "></i>
                            {{ $players->get_phone_number() }}
                        </p>
                        <p class="mb-3 text-white text-md font-title">
                            <i class="w-6 h-6 fas fa-dollar-sign"></i>
                            Argent sur vous: {{ $players->money }} $
                        </p>
                        <p class="mb-3 text-white text-md font-title">
                            <i class="w-6 h-6 fas fa-university"></i>
                            Argent en banque: {{ $players->bank }} $
                        </p>

                        <p class="mb-3 text-white text-md font-title">
                            <i class="w-6 h-6 fas fa-car"></i>
                            Nombre de vehicules: {{ \App\Models\FiveM\VehiculePossessed::where('owner', $players->identifier)->count() }}
                        </p>
                       

                    </div>
                </div>
            
            </div>
        </div>
    </div>
    @if ($players->isBoss() || $players->isOrgBoss() )

        <section class="">
            <div class="px-8 py-8 mx-auto max-w-7xl">
                <div
                    class="relative px-6 py-10 overflow-hidden border border-red rounded-2xl lg:p-16 lg:flex lg:flex-col lg:items-center lg:justify-between">

                    <!-- Left Pattern -->
                    <div
                        class="absolute top-0 left-0 z-10 hidden h-full p-4  -mt-4 -ml-4 transform -rotate-90 lg:block">
                        <svg class="w-auto h-full fill-current text-red" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 390 390">
                            <defs></defs>
                            <g fill-rule="nonzero">
                                <circle cx="10" cy="10" r="9.5"></circle>
                                <circle cx="47" cy="10" r="9.5"></circle>
                                <circle cx="84" cy="10" r="9.5"></circle>
                                <circle cx="121" cy="10" r="9.5"></circle>
                                <circle cx="158" cy="10" r="9.5"></circle>
                                <circle cx="195" cy="10" r="9.5"></circle>
                                <circle cx="232" cy="10" r="9.5"></circle>
                                <circle cx="269" cy="10" r="9.5"></circle>
                                <circle cx="306" cy="10" r="9.5"></circle>
                                <circle cx="343" cy="10" r="9.5"></circle>
                                <circle cx="380" cy="10" r="9.5"></circle>
                                <circle cx="47" cy="47" r="9.5"></circle>
                                <circle cx="84" cy="47" r="9.5"></circle>
                                <circle cx="121" cy="47" r="9.5"></circle>
                                <circle cx="158" cy="47" r="9.5"></circle>
                                <circle cx="195" cy="47" r="9.5"></circle>
                                <circle cx="232" cy="47" r="9.5"></circle>
                                <circle cx="269" cy="47" r="9.5"></circle>
                                <circle cx="306" cy="47" r="9.5"></circle>
                                <circle cx="343" cy="47" r="9.5"></circle>
                                <circle cx="380" cy="47" r="9.5"></circle>
                                <circle cx="84" cy="84" r="9.5"></circle>
                                <circle cx="121" cy="84" r="9.5"></circle>
                                <circle cx="158" cy="84" r="9.5"></circle>
                                <circle cx="195" cy="84" r="9.5"></circle>
                                <circle cx="232" cy="84" r="9.5"></circle>
                                <circle cx="269" cy="84" r="9.5"></circle>
                                <circle cx="306" cy="84" r="9.5"></circle>
                                <circle cx="343" cy="84" r="9.5"></circle>
                                <circle cx="380" cy="84" r="9.5"></circle>
                                <circle cx="121" cy="121" r="9.5"></circle>
                                <circle cx="158" cy="121" r="9.5"></circle>
                                <circle cx="195" cy="121" r="9.5"></circle>
                                <circle cx="232" cy="121" r="9.5"></circle>
                                <circle cx="269" cy="121" r="9.5"></circle>
                                <circle cx="306" cy="121" r="9.5"></circle>
                                <circle cx="343" cy="121" r="9.5"></circle>
                                <circle cx="380" cy="121" r="9.5"></circle>
                                <circle cx="158" cy="158" r="9.5"></circle>
                                <circle cx="195" cy="158" r="9.5"></circle>
                                <circle cx="232" cy="158" r="9.5"></circle>
                                <circle cx="269" cy="158" r="9.5"></circle>
                                <circle cx="306" cy="158" r="9.5"></circle>
                                <circle cx="343" cy="158" r="9.5"></circle>
                                <circle cx="380" cy="158" r="9.5"></circle>
                                <circle cx="195" cy="195" r="9.5"></circle>
                                <circle cx="232" cy="195" r="9.5"></circle>
                                <circle cx="269" cy="195" r="9.5"></circle>
                                <circle cx="306" cy="195" r="9.5"></circle>
                                <circle cx="343" cy="195" r="9.5"></circle>
                                <circle cx="380" cy="195" r="9.5"></circle>
                                <circle cx="232" cy="232" r="9.5"></circle>
                                <circle cx="269" cy="232" r="9.5"></circle>
                                <circle cx="306" cy="232" r="9.5"></circle>
                                <circle cx="343" cy="232" r="9.5"></circle>
                                <circle cx="380" cy="232" r="9.5"></circle>
                                <circle cx="269" cy="269" r="9.5"></circle>
                                <circle cx="306" cy="269" r="9.5"></circle>
                                <circle cx="343" cy="269" r="9.5"></circle>
                                <circle cx="380" cy="269" r="9.5"></circle>
                                <circle cx="306" cy="306" r="9.5"></circle>
                                <circle cx="343" cy="306" r="9.5"></circle>
                                <circle cx="380" cy="306" r="9.5"></circle>
                                <circle cx="343" cy="343" r="9.5"></circle>
                                <circle cx="380" cy="343" r="9.5"></circle>
                                <circle cx="380" cy="380" r="9.5"></circle>
                            </g>
                        </svg>
                    </div>

                    <!-- Right Pattern -->
                    <div
                        class="absolute bottom-0 right-0 z-10 hidden h-full p-4 mt-1 ml-3 -mb-4 -mr-4 transform rotate-90 md:block">
                        <svg class="w-auto h-full fill-current text-red-light" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 390 390">
                            <defs></defs>
                            <g fill-rule="nonzero">
                                <circle cx="10" cy="10" r="9.5"></circle>
                                <circle cx="47" cy="10" r="9.5"></circle>
                                <circle cx="84" cy="10" r="9.5"></circle>
                                <circle cx="121" cy="10" r="9.5"></circle>
                                <circle cx="158" cy="10" r="9.5"></circle>
                                <circle cx="195" cy="10" r="9.5"></circle>
                                <circle cx="232" cy="10" r="9.5"></circle>
                                <circle cx="269" cy="10" r="9.5"></circle>
                                <circle cx="306" cy="10" r="9.5"></circle>
                                <circle cx="343" cy="10" r="9.5"></circle>
                                <circle cx="380" cy="10" r="9.5"></circle>
                                <circle cx="47" cy="47" r="9.5"></circle>
                                <circle cx="84" cy="47" r="9.5"></circle>
                                <circle cx="121" cy="47" r="9.5"></circle>
                                <circle cx="158" cy="47" r="9.5"></circle>
                                <circle cx="195" cy="47" r="9.5"></circle>
                                <circle cx="232" cy="47" r="9.5"></circle>
                                <circle cx="269" cy="47" r="9.5"></circle>
                                <circle cx="306" cy="47" r="9.5"></circle>
                                <circle cx="343" cy="47" r="9.5"></circle>
                                <circle cx="380" cy="47" r="9.5"></circle>
                                <circle cx="84" cy="84" r="9.5"></circle>
                                <circle cx="121" cy="84" r="9.5"></circle>
                                <circle cx="158" cy="84" r="9.5"></circle>
                                <circle cx="195" cy="84" r="9.5"></circle>
                                <circle cx="232" cy="84" r="9.5"></circle>
                                <circle cx="269" cy="84" r="9.5"></circle>
                                <circle cx="306" cy="84" r="9.5"></circle>
                                <circle cx="343" cy="84" r="9.5"></circle>
                                <circle cx="380" cy="84" r="9.5"></circle>
                                <circle cx="121" cy="121" r="9.5"></circle>
                                <circle cx="158" cy="121" r="9.5"></circle>
                                <circle cx="195" cy="121" r="9.5"></circle>
                                <circle cx="232" cy="121" r="9.5"></circle>
                                <circle cx="269" cy="121" r="9.5"></circle>
                                <circle cx="306" cy="121" r="9.5"></circle>
                                <circle cx="343" cy="121" r="9.5"></circle>
                                <circle cx="380" cy="121" r="9.5"></circle>
                                <circle cx="158" cy="158" r="9.5"></circle>
                                <circle cx="195" cy="158" r="9.5"></circle>
                                <circle cx="232" cy="158" r="9.5"></circle>
                                <circle cx="269" cy="158" r="9.5"></circle>
                                <circle cx="306" cy="158" r="9.5"></circle>
                                <circle cx="343" cy="158" r="9.5"></circle>
                                <circle cx="380" cy="158" r="9.5"></circle>
                                <circle cx="195" cy="195" r="9.5"></circle>
                                <circle cx="232" cy="195" r="9.5"></circle>
                                <circle cx="269" cy="195" r="9.5"></circle>
                                <circle cx="306" cy="195" r="9.5"></circle>
                                <circle cx="343" cy="195" r="9.5"></circle>
                                <circle cx="380" cy="195" r="9.5"></circle>
                                <circle cx="232" cy="232" r="9.5"></circle>
                                <circle cx="269" cy="232" r="9.5"></circle>
                                <circle cx="306" cy="232" r="9.5"></circle>
                                <circle cx="343" cy="232" r="9.5"></circle>
                                <circle cx="380" cy="232" r="9.5"></circle>
                                <circle cx="269" cy="269" r="9.5"></circle>
                                <circle cx="306" cy="269" r="9.5"></circle>
                                <circle cx="343" cy="269" r="9.5"></circle>
                                <circle cx="380" cy="269" r="9.5"></circle>
                                <circle cx="306" cy="306" r="9.5"></circle>
                                <circle cx="343" cy="306" r="9.5"></circle>
                                <circle cx="380" cy="306" r="9.5"></circle>
                                <circle cx="343" cy="343" r="9.5"></circle>
                                <circle cx="380" cy="343" r="9.5"></circle>
                                <circle cx="380" cy="380" r="9.5"></circle>
                            </g>
                        </svg>
                    </div>

                    @if($players->isBoss())
                    <h3 class="relative z-20 mb-4 -mt-1 text-4xl font-bold text-white">
                        Vous êtes {{ $players->getJobGrade()->label }} de {{ $players->getJob()->label }}
                    </h3>
                    @else 
                    @endif
                    @if($players->isOrgBoss())<h3 class="relative z-20 mb-4 -mt-1 text-4xl font-bold text-white">Vous êtes {{ $players->getOrgGrade()->label }} de {{ $players->getOrg()->label }}</h3>
                        @endif
                    <div
                        class="relative z-20 flex flex-col items-center w-full space-y-5 md:space-x-5 md:space-y-0 md:flex-row md:w-auto lg:flex-shrink-0 md:px-0">
                        @if ($players->isBoss())
                        <div class="hover:shadow-3xl transition-shadow duration-500">
                            <a href="{{ route('entreprise-index') }}" data-turbolinks="false" 
                                class="block w-full px-5 py-3 text-base font-medium leading-6 text-center text-white transition duration-150 ease-in-out rounded-md bg-red md:inline-flex md:shadow-sm md:w-auto hover:bg-red-light focus:outline-none focus:shadow-outline">Gérez
                                votre entreprise</a>
                            </div>
                        @endif
                        @if ($players->isOrgBoss())
                        <div class="hover:shadow-4xl transition-shadow duration-500">
                            <a href="{{ route('org-index') }}" data-turbolinks="false" 
                                class="block w-full px-5 py-3 text-base font-medium leading-6 text-center transition duration-150 ease-in-out bg-blue-100 rounded-md text-red md:inline-flex md:shadow-sm md:w-auto hover:bg-blue-50 focus:outline-none focus:shadow-outline">Gérez
                                votre organisation</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </section>
    @else
    @endif
    @else
    @endif
    @foreach(\Auth::user()->submissions as $sub)

    <section class="">
        <div class="px-8 py-8 mx-auto text-center max-w-7xl">
            <div
                class="relative px-6 py-10 overflow-hidden border border-red rounded-2xl lg:p-16 lg:flex lg:flex-col lg:items-center lg:justify-between">

                <div
                    class="absolute top-0 left-0 z-10 hidden h-full p-4 mt-1 -mt-4 -ml-4 transform -rotate-90 lg:block">
                    <svg class="w-auto h-full fill-current text-red" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 390 390">
                        <defs></defs>
                        <g fill-rule="nonzero">
                            <circle cx="10" cy="10" r="9.5"></circle>
                            <circle cx="47" cy="10" r="9.5"></circle>
                            <circle cx="84" cy="10" r="9.5"></circle>
                            <circle cx="121" cy="10" r="9.5"></circle>
                            <circle cx="158" cy="10" r="9.5"></circle>
                            <circle cx="195" cy="10" r="9.5"></circle>
                            <circle cx="232" cy="10" r="9.5"></circle>
                            <circle cx="269" cy="10" r="9.5"></circle>
                            <circle cx="306" cy="10" r="9.5"></circle>
                            <circle cx="343" cy="10" r="9.5"></circle>
                            <circle cx="380" cy="10" r="9.5"></circle>
                            <circle cx="47" cy="47" r="9.5"></circle>
                            <circle cx="84" cy="47" r="9.5"></circle>
                            <circle cx="121" cy="47" r="9.5"></circle>
                            <circle cx="158" cy="47" r="9.5"></circle>
                            <circle cx="195" cy="47" r="9.5"></circle>
                            <circle cx="232" cy="47" r="9.5"></circle>
                            <circle cx="269" cy="47" r="9.5"></circle>
                            <circle cx="306" cy="47" r="9.5"></circle>
                            <circle cx="343" cy="47" r="9.5"></circle>
                            <circle cx="380" cy="47" r="9.5"></circle>
                            <circle cx="84" cy="84" r="9.5"></circle>
                            <circle cx="121" cy="84" r="9.5"></circle>
                            <circle cx="158" cy="84" r="9.5"></circle>
                            <circle cx="195" cy="84" r="9.5"></circle>
                            <circle cx="232" cy="84" r="9.5"></circle>
                            <circle cx="269" cy="84" r="9.5"></circle>
                            <circle cx="306" cy="84" r="9.5"></circle>
                            <circle cx="343" cy="84" r="9.5"></circle>
                            <circle cx="380" cy="84" r="9.5"></circle>
                            <circle cx="121" cy="121" r="9.5"></circle>
                            <circle cx="158" cy="121" r="9.5"></circle>
                            <circle cx="195" cy="121" r="9.5"></circle>
                            <circle cx="232" cy="121" r="9.5"></circle>
                            <circle cx="269" cy="121" r="9.5"></circle>
                            <circle cx="306" cy="121" r="9.5"></circle>
                            <circle cx="343" cy="121" r="9.5"></circle>
                            <circle cx="380" cy="121" r="9.5"></circle>
                            <circle cx="158" cy="158" r="9.5"></circle>
                            <circle cx="195" cy="158" r="9.5"></circle>
                            <circle cx="232" cy="158" r="9.5"></circle>
                            <circle cx="269" cy="158" r="9.5"></circle>
                            <circle cx="306" cy="158" r="9.5"></circle>
                            <circle cx="343" cy="158" r="9.5"></circle>
                            <circle cx="380" cy="158" r="9.5"></circle>
                            <circle cx="195" cy="195" r="9.5"></circle>
                            <circle cx="232" cy="195" r="9.5"></circle>
                            <circle cx="269" cy="195" r="9.5"></circle>
                            <circle cx="306" cy="195" r="9.5"></circle>
                            <circle cx="343" cy="195" r="9.5"></circle>
                            <circle cx="380" cy="195" r="9.5"></circle>
                            <circle cx="232" cy="232" r="9.5"></circle>
                            <circle cx="269" cy="232" r="9.5"></circle>
                            <circle cx="306" cy="232" r="9.5"></circle>
                            <circle cx="343" cy="232" r="9.5"></circle>
                            <circle cx="380" cy="232" r="9.5"></circle>
                            <circle cx="269" cy="269" r="9.5"></circle>
                            <circle cx="306" cy="269" r="9.5"></circle>
                            <circle cx="343" cy="269" r="9.5"></circle>
                            <circle cx="380" cy="269" r="9.5"></circle>
                            <circle cx="306" cy="306" r="9.5"></circle>
                            <circle cx="343" cy="306" r="9.5"></circle>
                            <circle cx="380" cy="306" r="9.5"></circle>
                            <circle cx="343" cy="343" r="9.5"></circle>
                            <circle cx="380" cy="343" r="9.5"></circle>
                            <circle cx="380" cy="380" r="9.5"></circle>
                        </g>
                    </svg>
                </div>

                <div
                    class="absolute bottom-0 right-0 z-10 hidden h-full p-4 mt-1 ml-3 -mb-4 -mr-4 transform rotate-90 md:block">
                    <svg class="w-auto h-full fill-current text-red-light" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 390 390">
                        <defs></defs>
                        <g fill-rule="nonzero">
                            <circle cx="10" cy="10" r="9.5"></circle>
                            <circle cx="47" cy="10" r="9.5"></circle>
                            <circle cx="84" cy="10" r="9.5"></circle>
                            <circle cx="121" cy="10" r="9.5"></circle>
                            <circle cx="158" cy="10" r="9.5"></circle>
                            <circle cx="195" cy="10" r="9.5"></circle>
                            <circle cx="232" cy="10" r="9.5"></circle>
                            <circle cx="269" cy="10" r="9.5"></circle>
                            <circle cx="306" cy="10" r="9.5"></circle>
                            <circle cx="343" cy="10" r="9.5"></circle>
                            <circle cx="380" cy="10" r="9.5"></circle>
                            <circle cx="47" cy="47" r="9.5"></circle>
                            <circle cx="84" cy="47" r="9.5"></circle>
                            <circle cx="121" cy="47" r="9.5"></circle>
                            <circle cx="158" cy="47" r="9.5"></circle>
                            <circle cx="195" cy="47" r="9.5"></circle>
                            <circle cx="232" cy="47" r="9.5"></circle>
                            <circle cx="269" cy="47" r="9.5"></circle>
                            <circle cx="306" cy="47" r="9.5"></circle>
                            <circle cx="343" cy="47" r="9.5"></circle>
                            <circle cx="380" cy="47" r="9.5"></circle>
                            <circle cx="84" cy="84" r="9.5"></circle>
                            <circle cx="121" cy="84" r="9.5"></circle>
                            <circle cx="158" cy="84" r="9.5"></circle>
                            <circle cx="195" cy="84" r="9.5"></circle>
                            <circle cx="232" cy="84" r="9.5"></circle>
                            <circle cx="269" cy="84" r="9.5"></circle>
                            <circle cx="306" cy="84" r="9.5"></circle>
                            <circle cx="343" cy="84" r="9.5"></circle>
                            <circle cx="380" cy="84" r="9.5"></circle>
                            <circle cx="121" cy="121" r="9.5"></circle>
                            <circle cx="158" cy="121" r="9.5"></circle>
                            <circle cx="195" cy="121" r="9.5"></circle>
                            <circle cx="232" cy="121" r="9.5"></circle>
                            <circle cx="269" cy="121" r="9.5"></circle>
                            <circle cx="306" cy="121" r="9.5"></circle>
                            <circle cx="343" cy="121" r="9.5"></circle>
                            <circle cx="380" cy="121" r="9.5"></circle>
                            <circle cx="158" cy="158" r="9.5"></circle>
                            <circle cx="195" cy="158" r="9.5"></circle>
                            <circle cx="232" cy="158" r="9.5"></circle>
                            <circle cx="269" cy="158" r="9.5"></circle>
                            <circle cx="306" cy="158" r="9.5"></circle>
                            <circle cx="343" cy="158" r="9.5"></circle>
                            <circle cx="380" cy="158" r="9.5"></circle>
                            <circle cx="195" cy="195" r="9.5"></circle>
                            <circle cx="232" cy="195" r="9.5"></circle>
                            <circle cx="269" cy="195" r="9.5"></circle>
                            <circle cx="306" cy="195" r="9.5"></circle>
                            <circle cx="343" cy="195" r="9.5"></circle>
                            <circle cx="380" cy="195" r="9.5"></circle>
                            <circle cx="232" cy="232" r="9.5"></circle>
                            <circle cx="269" cy="232" r="9.5"></circle>
                            <circle cx="306" cy="232" r="9.5"></circle>
                            <circle cx="343" cy="232" r="9.5"></circle>
                            <circle cx="380" cy="232" r="9.5"></circle>
                            <circle cx="269" cy="269" r="9.5"></circle>
                            <circle cx="306" cy="269" r="9.5"></circle>
                            <circle cx="343" cy="269" r="9.5"></circle>
                            <circle cx="380" cy="269" r="9.5"></circle>
                            <circle cx="306" cy="306" r="9.5"></circle>
                            <circle cx="343" cy="306" r="9.5"></circle>
                            <circle cx="380" cy="306" r="9.5"></circle>
                            <circle cx="343" cy="343" r="9.5"></circle>
                            <circle cx="380" cy="343" r="9.5"></circle>
                            <circle cx="380" cy="380" r="9.5"></circle>
                        </g>
                    </svg>
                </div>

              <h3 class="relative z-20 mb-4 -mt-1 text-2xl font-bold text-white">{{ $sub->form->name }}: <span class="inline-block px-6 py-2 font-medium leading-7 text-center text-{{$sub->getTagColor()}} uppercase transition bg-transparent border-2 border-{{$sub->getTagColor()}} rounded shadow-lg ripple focus:outline-none shadow-red-500/50">{{ $sub->getTagName() }}</span></h3>



            </div>
        </div>
    </section>
    @endforeach
</div>
@endsection
