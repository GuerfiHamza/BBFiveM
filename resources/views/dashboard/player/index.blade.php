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
            <div class="w-full overflow-x-auto  bg-gray-300 dark:bg-gray-800">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-300 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Nom / ID</th>
                            <th class="px-4 py-3">Argent liquide</th>
                            <th class="px-4 py-3">Argent en banque</th>
                            <th class="px-4 py-3">Derniere Connexion</th>
                        </tr>
                    </thead>
                    <tbody class=" divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($players as $player)
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
                                    {{ number_format($player->money, 2) }}$
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ number_format($player->bank, 2) }}$
                                </td>
                                <td class="px-4 py-3">
                                    {{ $player->lastconnexion }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
           {{ $players->links() }}
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
    </script>
@stop
