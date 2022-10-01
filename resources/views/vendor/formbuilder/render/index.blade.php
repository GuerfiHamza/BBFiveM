@extends('formbuilder::layout')

@section('title', 'Formulaire ' . $pageTitle)

@section('content')
<div class="mt-16 w-full flex flex-row items-center justify-center">
    <div class="bg-gray-900 shadow-2xl rounded py-4 px-8 text-gray-300 w-1/2 mb-16 font-opensans" id="card-form">
    
        <h3 class="text-2xl text-center mb-3uppercase font-bold">{{ $pageTitle }}</h3>
    
        <form action="{{ route('formbuilder::form.submit', $form->identifier) }}" method="POST" id="submitForm" enctype="multipart/form-data">
            @csrf
            
            <div id="fb-render"></div>
            <div class="flex justify-between items-center mt-5">
           
            <a href="{{route('index')}}" class="inline-block px-4 py-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-red-light md:inline-flex md:w-auto hover:bg-red-dark focus:outline-none focus:shadow-outline cursor-pointer">
                <i class="fa fa-submit"></i> Annuler
            </a>
            <button type="submit" class="inline-block px-4 py-2 font-medium leading-6 text-center text-white transition duration-150 delay-150 ease-in-out rounded-md bg-green-500 md:inline-flex md:w-auto hover:bg-green-700 focus:outline-none focus:shadow-outline cursor-pointer" data-form="submitForm" data-message="Envoyer le formulaire pour '{{ $form->name }}'?">
                <i class="fa fa-submit"></i> Envoyer
            </button>
        </div>
        </form>
    </div>
</div>
@endsection

@push('js')
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script src="{{ asset('vendor/formbuilder/js/render-form.js') }}{{ restray\FormBuilder\Helper::bustCache() }}" defer></script>
@endpush
