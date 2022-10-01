@extends('formbuilder::forms.layout')

@section('content')
<div class="container grid px-6 mx-auto">
    <div class="flex items-center justify-between">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Création d'un Formulaire
        </h2>
     
    </div>
    
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
     
            <form action="{{ route('dashboard-formbuilder::forms.forms.store') }}" method="POST" id="createFormForm">
                @csrf

                <div class="bg-gray-800 text-white py-8 px-4 border-red">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Nom</label>

                                <input id="name" type="text" class="mb-2 dark:bg-gray-800 dark:text-white border rounded-md border-red px-3 py-1 {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter Form Name">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="visibility" class="col-form-label">Visibilité</label>

                                <select name="visibility" id="visibility" class="mb-2 dark:bg-gray-800 dark:text-white border rounded-md border-red px-3 py-1" required="required">
                                    <option value="">Select Form Visibility</option>
                                    @foreach(restray\FormBuilder\Models\Form::$visibility_options as $option)
                                        <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('visibility'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('visibility') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4" style="display: none;" id="allows_edit_DIV">
                            <div class="form-group">
                                <label for="allows_edit" class="col-form-label">
                                    Allow Submission Edit
                                </label>

                                <select name="allows_edit" id="allows_edit" class="mb-2 dark:bg-gray-800 dark:text-white border rounded-md border-red px-3 py-1" required="required">
                                    <option value="0">Non (Valeurs non éditables)</option>
                                    <option value="1">Oui (Autoriser les utilisateurs a pouvoir éditer leurs données)</option>
                                </select>

                                @if ($errors->has('allows_edit'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('allows_edit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p>Activer le formulaire (afficher sur la page d'accueil)</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="enabled" name="enabled" value="true" class="custom-control-input">
                                <label class="custom-control-label" for="enabled">Activé</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="disabled" name="enabled" value="false" class="custom-control-input">
                                <label class="custom-control-label" for="disabled">Désactivé</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-info" role="alert">
                                <i class="fa fa-info-circle"></i>
                                Cliquer ou glissez-déposez un composants dans le cadre pour construire votre formulaire.
                            </div>

                            <div id="fb-editor" class="fb-editor text-black mt-3"></div>
                        </div>
                    </div>
                    <div class="card-footer flex justify-between mt-5 items-center" id="fb-editor-footer" style="display: none;">
                        <button type="button" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red fb-clear-btn">
                            <i class="fa fa-remove"></i> Nettoyer le formulaire
                        </button> 
                        <button type="button" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red fb-save-btn">
                            <i class="fa fa-save"></i> Envoyer &amp; Sauvegarder le formulaire
                        </button>
                    </div>
                </div>
            </form>

            
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
  <script src="{{ asset('vendor/formbuilder/js/script.js') }}{{ restray\FormBuilder\Helper::bustCache() }}" defer></script>
  <script type="text/javascript">
    window.FormBuilder = window.FormBuilder || {}
    window.FormBuilder.form_roles = @json($form_roles);
</script>
<script src="{{ asset('vendor/formbuilder/js/create-form.js') }}{{ restray\FormBuilder\Helper::bustCache() }}" defer></script>
@endsection
