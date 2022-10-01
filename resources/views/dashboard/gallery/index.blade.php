@extends('dashboard.layouts.app')

@section('title', 'Toutes les Images')


@section('content')
<div class="card">
    <div class="card-header"> Galerie
        <div class="card-header-actions"><a class="card-header-action" href="{{ route('dashboard-gallery.create') }}" >Ajouter une photo</a></div>
        </div>
    <div class="card-body">
        <table id="organisation-table" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gallery as $image)
                    <tr>
                        <td>
                            {{ $image->titre }}
                        </td>
                        <td><img src="{{ $image->image }}" alt="" style="height:80px"></td>
                        <td>
                            <form action="{{ route('dashboard-gallery.destroy', $image->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Titre</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="" id="delete-form" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Supprimer une gallery</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Etes-vous sur de vouloir supprimer la gallery de ce joueur ?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                </div>
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
        $('#organisation-table').DataTable();
    });

    function setModalDelete(route) {
        document.getElementById("delete-form").setAttribute("action", route);
    }
</script>
@stop
