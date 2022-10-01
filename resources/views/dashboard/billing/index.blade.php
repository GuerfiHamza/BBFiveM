@extends('dashboard.layouts.app')

@section('title', 'Toutes les factures')

@section('content_header')
@stop

@section('content')
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Tous les factures
    </h2>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto  bg-gray-300 dark:bg-gray-800">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-300 dark:text-gray-400 dark:bg-gray-800">
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
                                x-on:click="setModalDelete('{{ route('dashboard-billing.destroy', compact('billing')) }}')">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{ $billings->links() }}
    </div>
</div>
<div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" style="display: none;">
    <!-- Modal -->
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden  rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal" style="display: none;">
      <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
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
      <!-- Modal body -->
      <div class="mt-4 mb-6">
        <!-- Modal title -->
        <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
            Supprimer la facture
        </p>
        <!-- Modal description -->
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
{{-- <div class="card">
    <div class="card-header">
        Les Licenses
        </div>
    <div class="card-body">
        <table id="organisation-table" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Receveur</th>
                    <th>Envoyeur</th>
                    <th>Montant</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($billings as $billing)
                    <tr>
                        <td>
                            

                        </td>
                        <td>
                            
                      </td>
                        <td>{{ number_format($billing->amount) }} $</td>
                        <td>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="setModalDelete('{{ route('dashboard-billing.destroy', compact('billing')) }}')">Supprimer</button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Joueur</th>
                    <th>License</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div> --}}

{{-- <!-- Modal Delete -->
<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="" id="delete-form" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Supprimer une facture</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Etes-vous sur de vouloir supprimer la facture de ce joueur ?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
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
        $('#organisation-table').DataTable();
    });

    function setModalDelete(route) {
        document.getElementById("delete-form").setAttribute("action", route);
    }
</script>
@stop
