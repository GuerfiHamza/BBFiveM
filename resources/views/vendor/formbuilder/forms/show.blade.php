@extends('formbuilder::forms.layout')
@section('title' , 'Visualisation du formulaire ')
@section('content')
<div class="container grid px-6 mx-auto mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-0">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 ">
                        Visualisation du formulaire '{{ $form->name }}' 
                    </h5>

                        <div class="btn-toolbar float-md-right" role="toolbar">
                            <div class="btn-group" role="group">
                               
                                <a href="{{ route('dashboard-formbuilder::forms.submissions.index', $form) }}" class="px-5 py-3 mr-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                    <i class="fa fa-th-list"></i> Soumissions
                                </a> 
                                <a href="{{ route('dashboard-formbuilder::forms.forms.edit', $form) }}" class="px-5 py-3 mr-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                    <i class="fa fa-edit"></i> Editer
                                </a> 
                                <a href="{{ route('dashboard-formbuilder::forms.forms.create') }}" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                    <i class="fa fa-plus-circle"></i> Nouveau Formulaire
                                </a>
                            </div>
                        </div>
                </div>

                <div class="card-body bg-gray-800 text-white px-5 py-3 rounded-md border border-red">
                    <div id="fb-render"></div>
                </div>
            </div>
        </div>
        <div class="bg-gray-800 text-white px-5 py-3 rounded-md border border-red mt-3">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        Détails 
                        
                        <button class="btn btn-primary btn-sm clipboard float-right" data-clipboard-text="{{ route('formbuilder::form.render', $form->identifier) }}" data-message="Copied" data-original="Copy Form URL" title="Copy form URL to clipboard">
                            <i class="fa fa-clipboard"></i> Copier l'URL du formulaire
                        </button> 
                    </h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>URL: </strong> 
                        <a href="{{ route('formbuilder::form.render', $form->identifier) }}" class="float-right" target="_blank">
                            {{$form->identifier}}
                        </a>
                    </li>
                    <li class="list-group-item">
                        <strong>Visibilité: </strong> <span class="float-right">{{ $form->visibility }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Modifications autorisées: </strong> 
                        <span class="float-right">{{ $form->allowsEdit() ? 'Oui' : 'Non' }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Gérant: </strong> <span class="float-right">{{ $form->user->name }}</span>
                    </li>
                     <li class="list-group-item">
                        <strong>Nombres de soumissions: </strong> 
                        <span class="float-right">{{ $form->submissions_count }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Mis à jour le: </strong> 
                        <span class="float-right">
                            {{ $form->updated_at->toDayDateTimeString() }}
                        </span>
                    </li>
                    <li class="list-group-item">
                        <strong>Créer le: </strong> 
                        <span class="float-right">
                            {{ $form->created_at->toDayDateTimeString() }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
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
<script src="{{ asset('vendor/formbuilder/js/script.js') }}{{ restray\FormBuilder\Helper::bustCache() }}" defer>
</script>
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script src="{{ asset('vendor/formbuilder/js/preview-form.js') }}{{ restray\FormBuilder\Helper::bustCache() }}" defer></script>
@endsection
