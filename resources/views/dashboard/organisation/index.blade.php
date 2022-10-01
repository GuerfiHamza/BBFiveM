@extends('dashboard.layouts.app')

@section('title', 'Toutes nos Organisation')

@section('content_header')
    <h1>Les Organisations</h1>
@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('content')

    <div class="container grid px-6 mx-auto">
        <div class="flex justify-between items-center">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Tous les Organisations
            </h2>
            <input type="text" placeholder="Recherche" id="search" name="search"
                class="mb-2 dark:bg-gray-800 dark:text-white border rounded-2xl border-red h-10 px-2 py-2">
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto  bg-gray-300 dark:bg-gray-800">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-300 dark:text-gray-400 dark:bg-gray-800">
                             <th class="px-4 py-3">Nom</th>
                            <th class="px-4 py-3">Label</th>
                            <th class="px-4 py-3">Patron</th>
                            <th class="px-4 py-3">Argent</th>

                        </tr>
                    </thead>
                    <tbody class=" divide-y dark:divide-gray-700 dark:bg-gray-800">

                    </tbody>
                </table>
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
          
            fetch_customer_data();
            $(document).on('click', '#pagenum a', function(event){
            event.preventDefault(); 
            var page = $(this).attr('href').split('page=')[1];
            fetch_customer_data(page);
            });
            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ route('dashboard-org_search') }}",
                    method: 'GET',
                    data: {
                        query: query
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function() {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>
@stop
