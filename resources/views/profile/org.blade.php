@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    {{-- <section id="org-profile" class="flex flex-col items-center justify-center w-full min-h-screen pt-32 mb-32 text-gray-200 font-opensans">
        <div class="w-full p-8 mx-2 mt-16 bg-gray-800 rounded shadow-2xl md:w-3/4 md:mx-0">
            <h2 class="mb-4 text-3xl text-center">Votre Organisation: {{ $org->label }}</h2>

            <hr class="w-8 mx-auto my-6 border-b border-gray-600">

            <p class="text-xl text-center">Trésorerie: <span class="font-bold">{{ number_format($org->getTreasory(),2) }}$</span></p>

            <div id="selector" class="flex flex-row flex-wrap items-center justify-around w-1/2 mx-auto my-8">
                <a href="#" class="selector-link active" onclick="event.preventDefault(); enable(event, 'org-employees');">Membres</a>
                <a href="#" class="selector-link" onclick="event.preventDefault(); enable(event, 'org-treasory');">Trésorerie</a>
                <a href="#" class="selector-link" onclick="event.preventDefault(); enable(event, 'org-posts');">Postes</a>
                <a href="#" class="selector-link" onclick="event.preventDefault(); enable(event, 'org-vehicles')">Véhicules</a>
            </div>



        </div>
    </section> --}}
    <div class="container mx-auto mt-5">


        <div class="flex mt-10 ">

            <div class="w-1/4 overflow-hidden ">
                <div @click.away="open = false"
                    class="flex flex-col w-1/4 text-white bg-gray-800 full w-flex-shrink-0 md:w-64 dark-mode:text-gray-200 dark-mode:bg-gray-800 rounded-xl"
                    x-data="{ open: false }">
                    <div class="items-center justify-between flex-shrink-0 px-8 py-4 ">
                        <p
                            class="text-lg font-semibold tracking-widest text-center text-white uppercase rounded-lg focus:outline-none focus:shadow-outline">
                            {{ $org->label }} </p>
                        <p
                            class="text-sm font-semibold tracking-widest text-center text-white uppercase rounded-lg focus:outline-none focus:shadow-outline">
                            {{ number_format($org->getTreasory()) }} $</p>

                    </div>
                    <nav :class="{'block': open, 'hidden': !open}"
                        class="flex-grow px-4 mb-8 md:block md:pb-0 md:overflow-y-auto">
                        <a onclick="event.preventDefault(); enable(event, 'org-employees');"
                            class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg selector-link active hover:text-white hover:bg-orange focus:bg-orange focus:outline-none focus:shadow-outline"
                            href="#">Salariés</a>
                        <a onclick="event.preventDefault(); enable(event, 'org-treasory');"
                            class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg selector-link hover:text-white focus:text-white hover:bg-orange focus:bg-orange focus:outline-none focus:shadow-outline"
                            href="#">Trésorerie</a>
                        <a onclick="event.preventDefault(); enable(event, 'org-posts');"
                            class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg selector-link hover:text-white focus:text-white hover:bg-orange focus:bg-orange focus:outline-none focus:shadow-outline"
                            href="#">Postes</a>
                        <a onclick="event.preventDefault(); enable(event, 'org-vehicles');"
                            class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg selector-link hover:text-white focus:text-white hover:bg-orange focus:bg-orange focus:outline-none focus:shadow-outline"
                            href="#">Véhicules</a>

                    </nav>
                </div>
            </div>

            <div class="w-4/5 overflow-hidden lg:w-full xl:w-full">
                <div class="">

                    <div id="org-employees" class="block select">
                        <table class="w-5/6 text-gray-100 rounded-t-lg bg-gradient-to-tl from-gray-700 to-gray-800">
                            <thead class="">
                                <tr class="text-center border-b-2 border-orange">
                                    <th class="px-4 py-3">Membres</th>
                                    <th class="px-4 py-3">Poste</th>
                                    <th class="px-4 py-3">Salaire</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($org->members as $member)
                                    <tr class="text-left border-b-2 border-gray-800">
                                        <td class="px-4 py-2 border border-gray-800">{{ $member->name }}</td>
                                        <td class="px-4 py-2 border border-gray-800">
                                            {{ $member->getOrgGrade()->label ?? 'Erreur de grade || CHANGEZ LE GRADE IMMEDIATEMENT' }}
                                        </td>
                                        <td class="px-4 py-2 border border-gray-800">
                                            {{ $member->getOrgGrade()->salary ?? 'Erreur de grade || CHANGEZ LE GRADE IMMEDIATEMENT' }}$
                                        </td>
                                        @if ($member->identifier != \Auth::user()->players->identifier)
                                            <td class="px-4 py-2 text-center border border-gray-800"><a href="#" data-turbolinks="false"
                                                    onclick="toggleModalPromote({userName: '{{ $member->name }}', userId: '{{ $member->identifier }}'})"
                                                    class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-green-500 md:inline-flex md:w-auto hover:bg-green-700 focus:outline-none focus:shadow-outline cursor-pointer">Promouvoir</a>
                                                <a href="#" data-turbolinks="false"
                                                    onclick="toggleModalRetire({userName: '{{ $member->name }}', userId: '{{ $member->identifier }}'})"
                                                    class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-red-light md:inline-flex md:w-auto hover:bg-red-dark focus:outline-none focus:shadow-outline cursor-pointer">Virer</a>
                                            </td>
                                        @else
                                            <td class="px-4 py-2 text-center border border-gray-800">Aucune action...</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div id="org-treasory" class="hidden select">
                        <canvas id="myChart" width="400" height="150"></canvas>
                    </div>

                    <div id="org-posts" class="hidden select">
                        <table class="w-5/6 m-5 text-gray-100 rounded-t-lg bg-gradient-to-tl from-gray-700 to-gray-800">
                            <thead class="">
                                <tr class="text-center border-b-2 border-orange">
                                    <th class="px-4 py-3">Grade</th>
                                    <th class="px-4 py-3">Salaire</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($org->grades as $grade)
                                    <tr class="text-left border-b-2 border-gray-800 ">
                                        <td class="px-4 py-2 border border-gray-800">{{ $grade->label }}</td>
                                        <td class="px-4 py-2 border border-gray-800">{{ $grade->salary }}$</td>
                                        <td class="px-4 py-2 border border-gray-800"><a href="#" data-turbolinks="false"
                                                onclick="toggleModalPost({posteId: '{{ $grade->id }}', posteLabel: `{{ $grade->label }}`, posteSalary: {{ $grade->salary }}})"
                                                class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-green-500 md:inline-flex md:w-auto hover:bg-green-700 focus:outline-none focus:shadow-outline cursor-pointer">Modifier</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div id="org-vehicles" class="hidden select">

                        <form action="{{ route('org-reattribution') }}" method="post" class="pl-5 my-4">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded shadow"
                                onclick="confirm('Etes-vous sur ?') ? true : event.preventDefault()">Réattribuer tous les
                                véhicules des personnes non employés</button>
                        </form>

                        <table class="w-5/6 m-5 text-gray-100 rounded-t-lg bg-gradient-to-tl from-gray-700 to-gray-800">
                            <thead >
                                <tr class="text-center border-b-2 border-orange">
                                    <th class="px-4 py-3">Plaque</th>
                                    <th class="px-4 py-3">Véhicule</th>
                                    <th class="px-4 py-3">Attribution</th>
                                    <th class="px-4 py-3">Fourrière</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($org->vehicules as $vehicule)
                                    <tr class="text-left border-b-2 border-gray-800 ">
                                        <td class="px-4 py-2 border border-gray-800">{{ $vehicule->plate }}</td>
                                        <td class="px-4 py-2 border border-gray-800">{{ $vehicule->vehicle_name() }}</td>
                                        <td class="px-4 py-2 border border-gray-800">
                                            {{ $vehicule->player && $vehicule->owner != '1' ? $vehicule->player->name . ' (' . ($org->isMember($vehicule->player) ? 'employé' : 'non employé') . ')' : 'Aucune attribution' }}
                                        </td>
                                        <td class="px-4 py-2 border border-gray-800">
                                            {{ $vehicule->stored == 0 ? 'Oui' : 'Non' }}</td>
                                        <td class="px-4 py-2 border border-gray-800"><a href="#" data-turbolinks="false"
                                                onclick="toggleModalVehicle({vehiculePlate: '{{ $vehicule->plate }}'})"
                                                class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-green-500 md:inline-flex md:w-auto hover:bg-green-700 focus:outline-none focus:shadow-outline cursor-pointer">Modifier</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>

    </div>
    
    <div id="modalPromote" class="fixed top-0 left-0 flex items-center justify-center w-full h-full opacity-0 pointer-events-none modal">
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-25 cursor-pointer modal-overlay" onclick="toggleModalPromote()"></div>
        <div class="absolute w-1/2 p-4 shadow-lg bg-gradient-to-l bg-gray-900 rounded-md border border-red">
            <h3 class="mb-8 text-2xl text-center text-white font-lato">Changer le grade de <span id="user-promoted"></span></h3>
            <form action="{{ route('org-promote') }}" method="post">
                @csrf
                <input type="hidden" name="user" id="promote-user">

                <select name="grade" class="block w-full px-3 py-2 mb-2 border border-gray-500 rounded">
                    @foreach($org->grades->sortByDesc('grade') as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->label }}</option>
                    @endforeach
                </select>

                <button type="submit" class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-green-500 md:inline-flex md:w-auto hover:bg-green-700 focus:outline-none focus:shadow-outline cursor-pointer">Changer de grade</button>
                <a href="#" onclick="toggleModalPromote()" class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-red-light md:inline-flex md:w-auto hover:bg-red-dark focus:outline-none focus:shadow-outline cursor-pointer">Annuler</a>
            </form>
        </div>
    </div>

    <div id="modalRetire" class="fixed top-0 left-0 flex items-center justify-center w-full h-full opacity-0 pointer-events-none modal">
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-25 cursor-pointer modal-overlay" onclick="toggleModalRetire()"></div>
        <div class="absolute w-1/2 p-4 shadow-lg bg-gradient-to-l bg-gray-900 rounded-md border border-red">
            <h3 class="mb-8 text-2xl text-center text-white font-lato">Virer <span id="user-retired"></span></h3>
            <form action="{{ route('org-retire') }}" method="post" class="font-lato">
                @csrf

                <input type="hidden" name="user" id="retire-user">

                <label for="retire-name " class="text-white">Nom de la personne <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="retire-name" placeholder="Nom de la personne" class="block w-full px-3 py-2 my-2 border border-gray-500 rounded">

                <button type="submit" class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-green-500 md:inline-flex md:w-auto hover:bg-green-700 focus:outline-none focus:shadow-outline cursor-pointer">Virer</button>
                <a href="#" onclick="toggleModalRetire()" class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-red-light md:inline-flex md:w-auto hover:bg-red-dark focus:outline-none focus:shadow-outline cursor-pointer">Annuler</a>
            </form>
        </div>
    </div>

    <div id="modalPost" class="fixed top-0 left-0 flex items-center justify-center w-full h-full opacity-0 pointer-events-none modal">
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-25 cursor-pointer modal-overlay" onclick="toggleModalPost()"></div>
        <div class="absolute w-1/2 p-4 shadow-lg bg-gradient-to-l bg-gray-900 rounded-md border border-red">
            <h3 class="mb-8 text-2xl text-center text-white font-lato">Changer le poste "<span id="name-poste"></span>"</h3>
            <form action="{{ route('org-post') }}" method="post" class="font-lato">
                @csrf

                <input type="hidden" name="poste" id="poste-id">

                <label for="poste-name" class="text-white">Intitulé du poste <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="poste-name" class="block w-full px-3 py-2 my-2 border border-gray-500 rounded">

                <label for="poste-name" class="text-white">Salaire du poste <span class="text-red-500">*</span></label>
                <input type="number" min="1" name="salary" id="poste-salary" class="block w-full px-3 py-2 my-2 border border-gray-500 rounded">

                <button type="submit" class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-green-500 md:inline-flex md:w-auto hover:bg-green-700 focus:outline-none focus:shadow-outline cursor-pointer">Changer</button>
                <a href="#" onclick="toggleModalPost()" class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-red-light md:inline-flex md:w-auto hover:bg-red-dark focus:outline-none focus:shadow-outline cursor-pointer">Annuler</a>
            </form>
        </div>
    </div>

    <div id="modalVehicle" class="fixed top-0 left-0 flex items-center justify-center w-full h-full opacity-0 pointer-events-none modal">
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-25 cursor-pointer modal-overlay" onclick="toggleModalVehicle()"></div>
        <div class="absolute w-1/2 p-4 shadow-lg bg-gradient-to-l bg-gray-900 rounded-md border border-red">
            <h3 class="mb-8 text-2xl text-center text-white font-lato">Changer L'attribution de la voiture immatriculé <span id="vehicule-plate-string"></span></h3>
            <form action="{{ route('org-vehicle') }}" method="post">
                @csrf
                <input type="hidden" name="vehicle" id="vehicle-plate">

                <select name="player" class="block w-full px-3 py-2 mb-2 border border-gray-500 rounded">
                    <option value="null">Aucune attribution</option>
                    @foreach($org->members as $member)
                        <option value="{{ $member->identifier }}">{{ $member->name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-green-500 md:inline-flex md:w-auto hover:bg-green-700 focus:outline-none focus:shadow-outline cursor-pointer">Changer l'attribution</button>
                <a href="#" onclick="toggleModalVehicle()" class="inline-block px-4 py-2 mr-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-red-light md:inline-flex md:w-auto hover:bg-red-dark focus:outline-none focus:shadow-outline cursor-pointer">Annuler</a>
            </form>
        </div>
    </div>
     @endsection

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');

            Chart.defaults.global.defaultFontColor = "#fff";
            var myChart = new Chart(ctx, {
            type: 'line',
            scaleFontColor: "#FFFFFF",
            data: {
                labels: [
                    @foreach ($treasories as $treasory)
                        '{{ $treasory->created_at->format('d/m/Y G') }}h',
                    @endforeach
                ],
                datasets: [{
                    label: 'Trésorerie',
                    data: [{{ $treasories->pluck('treasory')->implode(',') }}],
                    backgroundColor: ['rgba(255, 255, 255, 0.5)'],
                    borderColor: ['white'],
                    pointBackgroundColor: [@foreach ($treasories as $treasory)'white',@endforeach],
                    borderWidth: 1
                }, {
                    label: 'Entrée/Sortie',
                    data: [{{ $treasoriesDifference->pluck('treasory')->implode(',') }}],
                    backgroundColor: ['rgba(255, 166, 0, 0.5)'],
                    borderColor: ['rgba(255, 166, 0, 1)'],
                    pointBackgroundColor: [@foreach ($treasories as $treasory)'rgba(255, 166, 0, 0.5)',@endforeach],
                    borderWidth: 1
                }]
            },
        });

        </script>
        <script>
            function disableAll() {
                var selects = document.getElementsByClassName("select");
                for (var i = 0; i < selects.length; i++) {
                    item = selects.item(i);

                    if (item.classList.contains('block')) {
                        item.classList.remove('block');
                    }

                    if (!item.classList.contains('hidden')) {
                        item.classList.add('hidden');
                    }
                }
            }

            function disableAllLink() {
                var selects = document.getElementsByClassName("selector-link");
                for (var i = 0; i < selects.length; i++) {
                    item = selects.item(i);

                    if (item.classList.contains('active')) {
                        item.classList.remove('active');
                    }
                }
            }

            function enable(event, id) {
                disableAllLink();
                disableAll();

                document.getElementById(id).classList.remove('hidden');
                document.getElementById(id).classList.add('block');

                event.target.classList.add('active');
            }

            function toggleModalPromote(infos = null) {
                const modal = document.querySelector('#modalPromote')

                if (infos) {
                    document.getElementById('promote-user').value = infos['userId'];
                    document.getElementById('user-promoted').innerHTML = infos['userName'];
                }

                modal.classList.toggle('opacity-0')
                modal.classList.toggle('pointer-events-none')
            }

            function toggleModalRetire(infos = null) {
                const modal = document.querySelector('#modalRetire')

                if (infos) {
                    document.getElementById('retire-user').value = infos['userId'];
                    document.getElementById('user-retired').innerHTML = infos['userName'];
                }

                modal.classList.toggle('opacity-0')
                modal.classList.toggle('pointer-events-none')
            }

            function toggleModalPost(infos = null) {
                const modal = document.querySelector('#modalPost')

                if (infos) {
                    document.getElementById('name-poste').innerHTML = infos['posteLabel'];
                    document.getElementById('poste-id').value = infos['posteId'];
                    document.getElementById('poste-name').value = infos['posteLabel'];
                    document.getElementById('poste-salary').value = infos['posteSalary'];
                }

                modal.classList.toggle('opacity-0')
                modal.classList.toggle('pointer-events-none')
            }

            function toggleModalVehicle(infos = null) {
                const modal = document.querySelector('#modalVehicle')

                if (infos) {
                    document.getElementById('vehicule-plate-string').innerHTML = infos['vehiculePlate'];
                    document.getElementById('vehicle-plate').value = infos['vehiculePlate'];
                }

                modal.classList.toggle('opacity-0')
                modal.classList.toggle('pointer-events-none')
            }

        </script>
    @endpush
