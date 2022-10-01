@extends('dashboard.layouts.app')

@section('title', 'Toutes les Images')

@section('content_header')
    <h1>Ajouter une photo</h1>
@stop

@section('content')

<form action="{{ route('dashboard-gallery.store') }}" method="post" enctype="multipart/form-data">
    <!-- Add CSRF Token -->
    @csrf
<div class="form-group">
    <label>Titre</label>
    <input type="text" class="form-control" name="titre" required>
</div>
<div class="form-group">
    <input type="file" name="image" required>
</div>
<button type="submit" class="btn btn-success">Submit</button>
</form>
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
