@extends('formbuilder::forms.layout')
@section('title', 'Formulaires')
@section('content')

<div class="container grid px-6 mx-auto">
    <div class="flex items-center justify-between">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Formulaires
        </h2>
        @if (\Auth::user()->isAdmin())

        <a href="{{ route('formbuilder::forms.create') }}" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
            <i class="fa fa-plus-circle"></i> Créer
        </a>
        @else
        @endif
    </div>
    
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto  bg-gray-300 dark:bg-gray-800">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-300 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">Visibilité</th>
                        <th class="px-4 py-3">Edition autorisée?</th>
                        <th class="px-4 py-3">Soumissions</th>
                        <th class="px-4 py-3">Actions</th>

                    </tr>
                </thead>
                <tbody class="divide-y dark:divide-gray-700 ">
            @if($forms->count())

                    @foreach ($forms as $form)
                        <tr class="text-gray-700 dark:text-gray-400">
              
                            <td class="px-4 py-3 text-sm">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $form->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $form->visibility }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $form->allowsEdit() ? 'YES' : 'NO' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $count }}
                            </td>
                            <td class="px-4 py-3">
                                <a href="{{ route('dashboard-formbuilder::forms.submissions.index', $form) }}" data-turbolinks="false" class="btn btn-primary btn-sm" title="View submissions for form '{{ $form->name }}'">
                                    <i class="fa fa-th-list"></i> Données
                                </a>
                                <a href="{{ route('dashboard-formbuilder::forms.forms.show', $form) }}" data-turbolinks="false" class="btn btn-primary btn-sm" title="Preview form '{{ $form->name }}'">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if (\Auth::user()->isAdmin())
                                    <a href="{{ route('dashboard-formbuilder::forms.forms.edit', $form) }}" data-turbolinks="false" class="btn btn-primary btn-sm" title="Edit form">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <button class="btn btn-primary btn-sm clipboard" data-clipboard-text="{{ route('formbuilder::form.render', $form->identifier) }}" data-message="" data-original="" title="Copy form URL to clipboard">
                                        <i class="fa fa-clipboard"></i>
                                    </button>

                                    <form action="{{ route('dashboard-formbuilder::forms.forms.destroy', $form) }}" method="POST" id="deleteFormForm_{{ $form->id }}" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm confirm-form" data-form="deleteFormForm_{{ $form->id }}" data-message="Delete form '{{ $form->name }}'?" title="Delete form '{{ $form->name }}'">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @else

                    <td class="px-4 py-3 text-white text-center" colspan="6">Aucun formulaire</td>
                    @endif
                </tbody>
            </table>
            
        </div>
    </div>
</div>



@endsection
@section('js')

    <script src="{{ asset('vendor/formbuilder/js/clipboard/clipboard.min.js') }}?b=ck24" defer></script>
    <script src="{{ asset('vendor/formbuilder/js/script.js') }}{{ restray\FormBuilder\Helper::bustCache() }}" defer>
    </script>
    
@endsection