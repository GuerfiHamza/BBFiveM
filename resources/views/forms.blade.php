@extends('layouts.app')

@section('title', 'Formulaires')

@section('content')
 

        @foreach(\restray\FormBuilder\Models\Form::where('enabled', true)->get() as $form)
        <section class="py-8 leading-7 text-white sm:py-12 md:py-16 lg:py-24">
            <div class="max-w-6xl px-10 mx-auto border-solid lg:px-12 bg-gray-900 py-16 rounded-md border border-red">
                <div class="flex flex-col items-start leading-7 text-white border-0 border-gray-200 lg:items-center lg:flex-row">
                    <div class="box-border flex-1 text-center border-solid sm:text-left">
                        <h2 class="m-0 text-4xl font-semibold leading-tight tracking-tight text-left text-white border-0 border-gray-200 sm:text-5xl">
                            {{ $form->name }}
                        </h2>

                    </div>
                    <div class="hover:shadow-3xl transition-shadow duration-500">
                    <a href="{{ route('formbuilder::form.render', ['identifier' => $form->identifier]) }}"  data-turbolinks="false" class="block w-full px-5 py-3 text-base font-medium leading-6 text-center text-white transition duration-150 ease-in-out rounded-md bg-red md:inline-flex md:shadow-sm md:w-auto hover:bg-red-light focus:outline-none focus:shadow-outline z-50">
                        S'inscrire
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
                </div>
            </div>
        </section>
        @endforeach

@endsection

{{-- 'tag-warning', 'tag-success', 'tag-danger', 'tag-default' --}}
