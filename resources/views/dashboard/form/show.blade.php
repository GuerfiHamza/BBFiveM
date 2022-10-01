@extends('dashboard.layouts.app')

@section('title', 'Tous nos joueurs')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Candidature sur {{ $form->name }}</h3>
            </div>
            <div class="card-body">
                <table id="form-table" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($form->candidatures as $user)
                            <tr>
                                <td>{{ $player->id }}</td>
                                <td><a href="{{ route('dashboard-player.show', ['form' => $form]) }}">{{ $form->name }}</a></td>
                                <td><a href="#" class="btn btn-success">A voir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card col-8">
            <div class="card-header">
                <h3 class="card-title">Exemple de formulaire sur {{ $form->name }}</h3>
            </div>
            <div class="card-body">
                <div id="fb-rendered-form"></div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Action sur {{ $form->name }}</h3>
                </div>
                <div class="card-body">
                    @if (\Auth::user()->players->group == "superadmin")
                        <form action="{{ route('dashboard-form.destroy', compact('form')) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('vendor/formbuilder/js/footable/css/footable.standalone.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}{{ restray\FormBuilder\Helper::bustCache() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop

@section('js')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-render.min.js"></script>

<script>
    var container = document.getElementById('fb-rendered-form');
    var formData = '{!! $form->contentForm !!}';

    var formRenderOpts = {
        container,
        formData,
        dataType: 'xml'
    };

    $(document).ready(function() {
        $('#form-table').DataTable();
        $(container).formRender(formRenderOpts);
    });
</script>
<script type="text/javascript">
    window.FormBuilder = {
        csrfToken: '{{ csrf_token() }}',
    }
</script>
<script src="{{ asset('vendor/formbuilder/js/jquery-ui.min.js') }}" defer></script>
<script src="{{ asset('vendor/formbuilder/js/sweetalert.min.js') }}" defer></script>
<script src="{{ asset('vendor/formbuilder/js/jquery-formbuilder/form-builder.min.js') }}" defer></script>
<script src="{{ asset('vendor/formbuilder/js/jquery-formbuilder/form-render.min.js') }}" defer></script>
<script src="{{ asset('vendor/formbuilder/js/parsleyjs/parsley.min.js') }}" defer></script>
<script src="{{ asset('vendor/formbuilder/js/clipboard/clipboard.min.js') }}?b=ck24" defer></script>
<script src="{{ asset('vendor/formbuilder/js/moment.js') }}"></script>
<script src="{{ asset('vendor/formbuilder/js/footable/js/footable.min.js') }}" defer></script>
<script src="{{ asset('vendor/formbuilder/js/script.js') }}{{ restray\FormBuilder\Helper::bustCache() }}" defer></script>
<script type="text/javascript">
    window.FormBuilder = window.FormBuilder || {}
    window.FormBuilder.form_roles = @json($form_roles);
</script>
<script src="{{ asset('vendor/formbuilder/js/create-form.js') }}{{ restray\FormBuilder\Helper::bustCache() }}" defer></script>
@stop
