@extends('dashboard.layouts.app')

@section('title', 'Tous nos formulaires')

@section('content_header')
    <h1>Les formulaires</h1>
@stop
@section('css')


@stop
@section('content')
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Formulaires
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
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
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
                                
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <h3 class="card-title col-6">Formulaires</h3>
            <div class="text-right col-6">
                <a href="{{ route('dashboard-form.create') }}" class="btn btn-success btn-sm">Créer</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="form-table" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Nombres de complete</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($forms as $form)
                    <tr>
                        <td>{{ $form->id }}</td>
                        <td><a href="{{ route('dashboard-form.show', ['form' => $form]) }}">{{ $form->name }}</a></td>
                        <td>N/A</td>
                        <td>.</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Nombres de complete</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
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
        $('#form-table').DataTable();
    });
</script>

@stop
