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
                {{number_format($organisation->getTreasory())}} $
                <h5>Armement:</h5>
                @forelse($wp->getLoadout()->weapons as $loadout)

                {{ $loadout->name }} x{{ $loadout->count }} <br>
                @empty
                    Aucun armement <br>
                @endforelse
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
                            <th>Grade Entreprise</th>
                            <th>Grade Org</th>
                            <th>Dernier Connexion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($organisation->members as $member)
                            <tr>
                                <td><a href="{{ route('dashboard-player.show', ['player' => $member]) }}">{{ $member->name }}</a></td>
                                <td>{{ $member->money + $member->bank }}</td>
                                <td>{{ $member->job_grade }}</td>
                                <td>{{ $member->org_grade }}</td>
                                <td>{{ $member->lastconnexion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Argent</th>
                            <th>Grade Entreprise</th>
                            <th>Grade Orga</th>
                            <th>Dernier Connexion</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Treasories</h3>
            </div>
            <canvas id="myChart" width="400" height="150"></canvas>


        </div>

        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Véhicule</h3>
            </div>
            <div class="card-body">
                <table id="organisation-member-table" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Attribution</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($organisation->vehicules as $vehicule)
                            <tr>

                                <td>{{ $vehicule->plate }}</td>
                                <td>{{ $vehicule->vehicle_name() }}</td>

                                <td>{{ ($vehicule->player && $vehicule->owner != "1") ? $vehicule->player->name . ' (' . ($organisation->isMember($vehicule->player) ? 'employé' : 'non employé') . ')' : 'Aucune attribution' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Attribution</th>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');

    Chart.defaults.global.defaultFontColor = "#000";
    var myChart = new Chart(ctx, {
        type: 'line',
        scaleFontColor: "#000",
        data: {
            labels: [
                @foreach($treasories as $treasory)
                    '{{ $treasory->created_at->format('d/m/Y G') }}h',
                @endforeach
            ],
            datasets: [{
                label: 'Trésorerie',
                data: [{{ $treasories->pluck('treasory')->implode(',') }}],
                backgroundColor: ['rgba(0, 0, 0, 0.5)'],
                borderColor: ['black'],
                pointBackgroundColor: [@foreach($treasories as $treasory)'black',@endforeach],
                borderWidth: 1
            },{
                label: 'Entrée/Sortie',
                data: [{{ $treasoriesDifference->pluck('treasory')->implode(',') }}],
                backgroundColor: ['rgba(255, 166, 0, 0.5)'],
                borderColor: ['rgba(255, 166, 0, 1)'],
                pointBackgroundColor: [@foreach($treasories as $treasory)'rgba(255, 166, 0, 0.5)',@endforeach],
                borderWidth: 1
            }]
        },
    });
</script>
@stop
