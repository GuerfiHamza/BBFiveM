@extends('dashboard.layouts.app')

@section('title', 'Créer un formulaire')

@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('vendor/formbuilder/js/footable/css/footable.standalone.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}{{ restray\FormBuilder\Helper::bustCache() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop
@section('content')
<h1>Faire un formulaire</h1>

<div class="card">
    <form action="{{ route('dashboard-form.store') }}" method="post" id="formBuilder">
        @csrf
        <input type="hidden" id="formDataInput" name="data">

        <div class="card-header">
            <h3 class="card-title">Créer un formulaire</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nom du Formulaire</label>
                <input type="text" name="formName" class="form-control" id="name" placeholder="Nom du formulaire">
            </div>

            <div class="build-wrap"></div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success" onclick="event.preventDefault(); formMakerSubmit()">Créer</button>
        </div>
    </form>
</div>
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="{{ asset('js/form-builder.min.js') }}"></script>
<script>
var formBuilder = null;

$(document).ready(function () {
    formBuilder = $('.build-wrap').formBuilder()
})

function formMakerSubmit() {
    var datas = formBuilder.actions.getData('xml')
    $('input#formDataInput').val(datas);
    document.getElementById('formBuilder').submit();
}
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
