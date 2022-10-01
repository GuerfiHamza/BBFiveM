@extends('dashboard.layouts.app')

@section('title', 'Toutes nos entreprises')

@section('content_header')
    <h1>Les entreprises</h1>
@stop

@section('content')

<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Tous les entreprises
    </h2>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">Label</th>
                        <th class="px-4 py-3">Patron</th>
                        <th class="px-4 py-3">Argent</th>
                      
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($job as $org)
                        <tr class="text-gray-700 dark:text-gray-400">
                          
                                <td class="px-4 py-3 text-sm">
                                    {{ $org->name }}
                                </td>
                           
                            <td class="px-4 py-3 text-sm">
                                {{ $org->label }}
                            </td>
                            
                            <td class="px-4 py-3 text-sm">
                                {{ $org->members->sortByDesc('job_grade')->pluck('name')->first()}}
                            </td>
                            <td class="px-4 py-3">
                                {{ number_format($org->getTreasory(),2) }} $
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        {{ $job->links() }}
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
        $('#organisation-table').DataTable();
    });
</script>
@stop
