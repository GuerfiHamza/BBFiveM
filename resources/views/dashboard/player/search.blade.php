@extends('dashboard.layouts.app')

@section('title', 'Tous nos joueurs')

@section('content_header')
    <h1>Les joueurs</h1>
@stop

@section('content')

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tous nos utilisateurs
        </h2>
        
      
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Nom / ID</th>
                            <th class="px-4 py-3">Argent liquide</th>
                            <th class="px-4 py-3">Argent en banque</th>
                            <th class="px-4 py-3">Informations</th>
                        </tr>
                    </thead>
                    <tbody class=" divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($results as $player)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->

                                        <div><a
                                                    href="{{ route('dashboard-player.show', compact('player')) }}">
                                            <p class="font-semibold">{{ $player->name }}
                                            </p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                SteamHex : {{ $player->license }}
                                            </p></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ number_format($player->get_Money(), 2) }}$
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ number_format($player->get_Bank(), 2) }}$
                                </td>
                                <td class="px-4 py-3">
                                    {{ $player->lastconnexion }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
           {{-- {{ $results->links() }} --}}
        </div>
    </div>
   
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tous les factures
        </h2>
    
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Receveur</th>
                            <th class="px-4 py-3">Envoyeur</th>
                            <th class="px-4 py-3">Montant</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class=" divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($billings as $billing)
                            <tr class="text-gray-700 dark:text-gray-400">
                              
                                    <td class="px-4 py-3 text-sm">
                                        <a href="{{ route('dashboard-player.show', ['player' => $billing->playerreciv]) }}">{{ $billing->playerreciv->name }}</a>
                                    </td>
                               
                                <td class="px-4 py-3 text-sm">
                                    <a href="{{ route('dashboard-player.show', ['player' => $billing->playersender]) }}">{{ $billing->playersender->name }}</a>
                                </td>
                                
                                <td class="px-4 py-3 text-sm">
                                    {{ number_format($billing->amount) }} $
                                </td>
                                <td class="px-4 py-3">
                                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete" @click="openModal"
                                    >
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" style="display: none;">
                                        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden  rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal" style="display: none;">
                                        <header class="flex justify-end">
                                            <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                                <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                            </button>
                                        </header>
                                        <form action="{{ route('dashboard-billing.destroy', compact('billing')) }}" id="delete-form" method="post">
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
                                </td>
                            </tr>
                        @endforeach
    
                    </tbody>
                </table>
            </div>
            {{ $billings->links() }}
        </div>
    </div>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tous les licenses
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Joueur</th>
                            <th class="px-4 py-3">License</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class=" divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($licenses as $license)
                            <tr class="text-gray-700 dark:text-gray-400">
                                @if ($license->player)
                                    <td class="px-4 py-3 text-sm">
                                        <a
                                            href="{{ route('dashboard-player.show', ['player' => $license->player]) }}">{{ $license->player->name }}</a>
                                    </td>
                                @else
                                <td class="px-4 py-3 text-sm">
                                    Aucun Joueur... ({{ $license->owner }})
                                </td>
                                @endif
                                <td class="px-4 py-3 text-sm">
                                    {{ $license->getNameAttribute() }}
                                </td>
                                <td class="px-4 py-3">
                                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete"
                                    @click="openModal"                               
                                     >
                                     
                                        
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" style="display: none;">
                                        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden  rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal" style="display: none;">
                                        <header class="flex justify-end">
                                            <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                                <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                            </button>
                                        </header>
                                        <form action="{{ route('dashboard-license.destroy', compact('license')) }}" id="delete-form" method="post">
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
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{-- {{ $licenses->links() }} --}}
        </div>
    </div>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tous les véhicules
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Joueur</th>
                            <th class="px-4 py-3">Vehicule</th>
                            <th class="px-4 py-3">Entreprise</th>
                            <th class="px-4 py-3">Action</th>

                        </tr>
                    </thead>
                    <tbody class=" divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($vehicules as $vehicule)
                            <tr class="text-gray-700 dark:text-gray-400">
                                @if ($vehicule->player)
                                    <td class="px-4 py-3 text-sm">
                                        <a href="{{ route('dashboard-player.show', ['player' => $vehicule->player]) }}">{{ $vehicule->player->name }}</a>
                                    </td>
                                @else
                                <td class="px-4 py-3 text-sm">
                                    Aucun joueur...
                                </td>
                                @endif
                                <td class="px-4 py-3 text-sm">
                                    {{ $vehicule->plate }}
                                </td>
                                @if ($vehicule->job)
                                    <td class="px-4 py-3 text-sm">
                                        <a
                                            href="{{ route('dashboard-job.show', ['job' => $vehicule->job]) }}">{{ $vehicule->job }}</a>
                                    </td>
                                @else
                                <td class="px-4 py-3 text-sm">
                                    Aucune Entreprise...
                                </td>
                                @endif
                                <td class="px-4 py-3">
                                    <button @click="openModal"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                    
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" style="display: none;">
                                        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden  rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal" style="display: none;">
                                        <header class="flex justify-end">
                                            <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                                <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg>
                                            </button>
                                        </header>
                                        <form action="{{ route('dashboard-vehicule.destroy', compact('vehicule')) }}" id="delete-form" method="post">
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
                                     </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $vehicules->links() }}
        </div>
    </div>
    <div x-show="isItemOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" style="display: none;">
        <div x-show="isItemOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeItem" @keydown.escape="closeItem" class="w-full px-6 py-4 overflow-hidden  rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal-add-item" style="display: none;">
          <header class="flex justify-end">
            <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeItem">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
              </svg>
            </button>
          </header>
          <form action="" id="delete-form" method="post">
            @csrf
            {{ method_field('DELETE') }}
          <div class="mt-4 mb-6">
            <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                Supprimer la voiture
            </p>
            <p class="text-sm text-gray-700 dark:text-gray-400">
                Etes-vous sur de vouloir supprimer la voiture de ce joueur ?
    
            </p>
          </div>
          <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
            <button @click="closeItem" type="button" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-red-500 rounded-lg dark:text-white sm:px-4 sm:py-2 sm:w-auto bg-red-600 active:bg-red-500 hover:border-red-700 hover:bg-red-700 focus:border-red-500 active:text-red-500 focus:outline-none focus:shadow-outline-red">
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
            $('#user-table').DataTable();
        });
        function setModalDelete(route) {
            document.getElementById("delete-form").setAttribute("action", route);
        }
        function setModalDelete2(route) {
            document.getElementById("delete-form2").setAttribute("action", route);
        }
    </script>
@stop
