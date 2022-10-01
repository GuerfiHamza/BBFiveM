@extends('dashboard.layouts.app')

@section('title', 'Tous nos joueurs')

@section('content')

    <div class="container mx-auto grid">
        <div class="grid overflow-hidden grid-cols-3 grid-rows-2 gap-2 mt-5">
            <div class="box row-span-2 dark:bg-gray-800 bg-gray-200 px-5 py-5 rounded-xl dark:text-white  border-red border">
                <h5 class="mb-3 font-medium text-center">Carte d'identité de {{ $player->getName() }}</h5>
                <x-id-card :name="$player->lastname" :surname="$player->firstname" :birthdate="$player->dateofbirth" :height="$player->getHeight()" :sex="$player->sex" />
            </div>
            <div
                class="box col-start-2 col-span-2 dark:bg-gray-800 bg-gray-200 px-5 py-5 rounded-xl dark:text-white border-red border">
                <div class="flex justify-between items-center">
                    <h5 class="mb-3 font-medium">Informations de {{ $player->getName() }}</h5>
                    <div class="flex justify-items-end">
                        @if (\Auth::user()->players->group == 'superadmin' && $player->getUser() !== null)
                            <form action="{{ route('dashboard-player.update', compact('player')) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="px-4 py-2 text-sm font-medium leading-5 mr-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                    name="access" value="{{ !$player->getUser()->soft_permission_dashboard }}">
                                    {{ $player->getUser()->canSeeDashboard() ? 'Retirer ses droits' : 'Ajouter ses droits' }}
                                </button>
                            </form>
                        @endif

                        @if (\Auth::user()->players->group == 'admin' || \Auth::user()->players->group == 'superadmin')
                            <button
                                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                @click="openWipe">
                                Wipe le joueur
                            </button>
                        @endif
                    </div>
                </div>
                <p>Informations: {{ $player->lastconnexion }}</p>
                <p class="my-5">Métier: {!! $player->job != 'unemployed' ? '<a href="' . route('dashboard-job.show', ['job' => $player->getJob()]) . '">' . $player->getJob()->label . '</a>' : 'Chomeur' !!} || Grade:
                    {{ $player->getJobGrade()->label ?? '' }}
                    ({{ $player->getJobGrade()->name ?? '' }} | {{ $player->job_grade ?? '' }}) <button @click="openJob"
                        class="float-right px-4 py-2 text-sm font-medium leading-5 mr-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                        Modifier son métier
                    </button>
                </p>
                <p class="my-5">Organisation: {!! $player->org != 'unorg' ? '<a href="' . route('dashboard-job.show', ['job' => $player->getOrg()]) . '">' . $player->getOrg()->label . '</a>' : 'Chomeur' !!} || Grade:
                    {{ $player->getOrgGrade()->label ?? '' }}
                    ({{ $player->getOrgGrade()->name ?? '' }} | {{ $player->org_grade ?? '' }}) <button
                        @click="openOrg"
                        class="float-right px-4 py-2 text-sm font-medium leading-5 mr-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                        Modifier son Organisation
                    </button>
                </p>

               
            </div>
            <div
                class="box col-start-2 col-span-2 dark:bg-gray-800 bg-gray-200 px-5 py-5 rounded-xl dark:text-white border-red border">
                <div class="flex justify-between items-center">
                    <h5 class="mb-3 font-medium text-center">Compte Bancaire de {{ $player->getName() }}</h5>
                    <a href="{{ route('dashboard-player.show-billings', compact('player')) }}"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Voir
                        tout</a>
                </div>
                <div class="flex justify-between items-center my-auto mt-5">
                    <p>Argent Liquide: {{ number_format($player->bank, 2) }}$</p><br>
                    <p>Argent Banque: {{ number_format($player->money, 2) }}$</p><br>
                    <p>Argent Sale: todo $</p><br>
                </div><br><br>
                <p class="text-center bg-red rounded-full px-2 py-2 text-white font-medium">Argent total:
                    {{ number_format($player->bank + $player->money, 2) }}$</p>

            </div>
            <div class="box dark:bg-gray-800 bg-gray-200 rounded-xl dark:text-white px-5 py-5 row-span-0 border-red border">
                <h5 class="mt-4">Personnage:</h5>
                
                {{ $player->getHunger()['name'] }} {{ number_format($player->getHunger()['percent'], 1) }}%:<div class="bg-red-600 h-1.5 rounded-full"
                style="width: {{ $player->getHunger()['percent'] }}%"></div> 
                
                {{ $player->getThirst()['name'] }} {{ number_format($player->getThirst()['percent'], 1) }}%:<div class="bg-red-600 h-1.5 rounded-full"
                style="width: {{ $player->getThirst()['percent'] }}%"></div> 
                
                {{ $player->getDrunk()['name'] }} {{ number_format($player->getDrunk()['percent'], 1) }}%:<div class="bg-red-600 h-1.5 rounded-full"
                style="width: {{ $player->getDrunk()['percent'] }}%"></div>
            </div>
            
            
            
        
            <div class="box col-start-2 col-span-2 dark:bg-gray-800 bg-gray-200 px-5 py-5 rounded-xl dark:text-white border-red border"
                style="height:36.5rem">

                <h5 class="mb-3 font-medium">Derniere position de {{ $player->getName() }}</h5>
                <x-map-component :position="$player->getPosition()" />


            </div>
        </div>

    </div>

    <div x-show="isJobOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        style="display: none;">
        <div x-show="isJobOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeJob" @keydown.escape="closeJob"
            class="w-full px-6 py-4 overflow-hidden  rounded-t-lg bg-white dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal-add-job" style="display: none;">
            <header class="flex justify-between">
                <h5 class="font-medium dark:text-white">Modifier son métier</h5>
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeJob">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <form action="{{ route('dashboard-player.jobedit', compact('player')) }}" id="" method="post">
                @csrf
                <div class="mt-4 mb-6">
                    <select type="text" name="job"
                        class="mb-2 w-full dark:bg-gray-800 dark:text-white border rounded-full border-red px-3 py-1" required>
                        @foreach (\App\Models\FiveM\Job::All() as $job)
                            <option value="{{ $job->name }}">{{ $job->label }}</option>
                        @endforeach
                    </select>
                    <select type="text" name="job_grade"
                        class="mb-2 w-full dark:bg-gray-800 dark:text-white border rounded-full border-red px-3 py-1" required>
                        @foreach (\App\Models\FiveM\JobGrade::All() as $jobgrade)
                            <option value="{{ $jobgrade->grade }}">{{ $jobgrade->job_name }}
                                ({{ $jobgrade->label }} | {{ $jobgrade->grade }})
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="identifier" value="{{ $player->identifier }}" class="mb-2 form-control"
                        required>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button @click="closeJob" type="button"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-red-500 rounded-lg dark:text-white sm:px-4 sm:py-2 sm:w-auto bg-red-600 active:bg-red-500 hover:border-red-700 hover:bg-red-700 focus:border-red-500 active:text-red-500 focus:outline-none focus:shadow-outline-red">
                        Annuler
                    </button>
                    <button type="submit"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                        Modifier
                    </button>
                </footer>
            </form>

        </div>
    </div>
    <div x-show="isOrgOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        style="display: none;">
        <div x-show="isOrgOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeOrg" @keydown.escape="closeOrg"
            class="w-full px-6 py-4 overflow-hidden  rounded-t-lg bg-white dark:bg-gray-800  sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal-add-org" style="display: none;">
            <header class="flex justify-between">
                <h5 class="font-medium dark:text-white">Modifier son métier</h5>
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeOrg">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <form action="{{ route('dashboard-player.orgedit', compact('player')) }}" id="" method="post">
                @csrf
                <div class="mt-4 mb-6">
                    <select type="text" name="org"
                        class="mb-2 w-full dark:bg-gray-800 dark:text-white border rounded-full border-red px-3 py-1" required>
                        @foreach (\App\Models\FiveM\Organisation::All() as $org)
                            <option value="{{ $org->name }}">{{ $org->label }}</option>
                        @endforeach
                    </select>
                    <select type="text" name="org_grade"
                        class="mb-2 w-full dark:bg-gray-800 dark:text-white border rounded-full border-red px-3 py-1" required>
                        @foreach (\App\Models\FiveM\OrgGrade::All() as $orggrade)
                            <option value="{{ $orggrade->grade }}">{{ $orggrade->job_name }}
                                ({{ $orggrade->label }} | {{ $orggrade->grade }})
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="identifier" value="{{ $player->identifier }}" class="mb-2 form-control"
                        required>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button @click="closeOrg" type="button"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-red-500 rounded-lg dark:text-white sm:px-4 sm:py-2 sm:w-auto bg-red-600 active:bg-red-500 hover:border-red-700 hover:bg-red-700 focus:border-red-500 active:text-red-500 focus:outline-none focus:shadow-outline-red">
                        Annuler
                    </button>
                    <button type="submit"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                        Modifier
                    </button>
                </footer>
            </form>

        </div>
    </div>
    <div x-show="isWipeOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        style="display: none;">
        <div x-show="isWipeOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeWipe"
            @keydown.escape="closeWipe"
            class="w-full px-6 py-4 overflow-hidden  rounded-t-lg bg-white dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal-add-wipe" style="display: none;">
            <header class="flex justify-between">
                <h5 class="font-medium dark:text-white">Wipe Le joueur</h5>
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeWipe">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <form action="{{ route('dashboard-player.destroy', compact('player')) }}" id="deleteUserSubmit"
                method="post">
                @csrf
                @method('DELETE')
                <div class="mt-4 mb-6">
                    @csrf

                    <input type="text" name="identifier" placeholder="Saisir le Identifiant du joueur"
                        class="mb-2 w-full dark:bg-gray-800 dark:text-white border rounded-full border-red px-3 py-1" required>
                    <small class="dark:text-white">Identifiant du joueur: {{ $player->identifier }}</small>
                    <input type="hidden" name="identifier" value="{{ $player->identifier }}" class="mb-2 form-control"
                        required>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button @click="closeWipe" type="button"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-red-500 rounded-lg dark:text-white sm:px-4 sm:py-2 sm:w-auto bg-red-600 active:bg-red-500 hover:border-red-700 hover:bg-red-700 focus:border-red-500 active:text-red-500 focus:outline-none focus:shadow-outline-red">
                        Annuler
                    </button>
                    <button type="submit"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                        Wipe
                    </button>
                </footer>
            </form>

        </div>
    </div>
    
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" style="display: none;">
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden  rounded-t-lg bg-white dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal" style="display: none;">
        <header class="flex justify-end">
            <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
            </button>
        </header>
        <form action="" id="delete-form" method="post">
            @csrf
            @method('DELETE')
        <div class="mt-4 mb-6">
            <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                Supprimer la facture
            </p>
            <p class="text-sm text-gray-700 dark:text-gray-400">
                Etes-vous sur de vouloir supprimer la facture de ce joueur ?

            </p>
        </div>
        <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
            <button @click="closeModal" type="button" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-red-500 rounded-lg dark:text-white sm:px-4 sm:py-2 sm:w-auto bg-red-600 active:bg-red-500 hover:border-red-700 hover:bg-red-700 focus:border-red-500 active:text-red-500 focus:outline-none focus:shadow-outline-red">
                Annuler
                </button>
                <button type="submit"class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                Confirmer
                </button>
        </footer>
        </form>

        </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#vehicule-user-table').DataTable();
            $('#license-table').DataTable();
        });
        function setModalDelete(route) {
        document.getElementById("delete-form").setAttribute("action", route);
    }
    </script>

@stop
