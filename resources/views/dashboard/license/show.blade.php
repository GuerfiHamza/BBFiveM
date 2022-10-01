@extends('dashboard.layouts.app')

@section('title', 'Tous nos joueurs')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Informations sur {{ $organisation->label }}</h3>
            </div>
            <div class="card-body">
                Aucune information...
            </div>
        </div>
        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Membres</h3>
            </div>
            <div class="card-body">
                <table id="organisation-member-table" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Argent</th>
                            <th>Dernier Connexion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($organisation->members as $member)
                            <tr>
                                <td><a href="{{ route('dashboard-player.show', ['player' => $member]) }}">{{ $member->name }}</a></td>
                                <td>{{ $member->money + $member->bank }}</td>
                                <td>{{ $member->lastconnexion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Argent</th>
                            <th>Dernier Connexion</th>
                        </tr>
                    </tfoot>
                </table>
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
        $('#organisation-member-table').DataTable();
    });
</script>
@stop
