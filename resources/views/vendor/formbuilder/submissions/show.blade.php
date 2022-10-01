@extends('dashboard.layouts.app')

@section('title', 'Soumission de formulaires')

@push('css')

<link rel="stylesheet" href="{{ asset('css/app.css') }}?v=1a040064279b">
@endpush

@section('content')
<div class="container grid px-6 mx-auto">

    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Soumission N°{{ $submission->id }} pour '{{ $submission->form->name }}'

                        <div class="float-right btn-toolbar" role="toolbar">
                            <div class="btn-group" role="group" aria-label="First group">
                                
                                <form action="{{ route('dashboard-formbuilder::forms.submissions.destroy', [$submission->form, $submission]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete submission" title="Delete this submission?">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </h5>
                </div>

                
            </div>
        </div>

        <div class="col-md-4 bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 px-3 py-2 dark:text-white rounded-md">
            <ul class="list-group list-group-flush ">
                    @foreach($form_headers as $header)
                        @if (!\Illuminate\Support\Str::contains($header['name'], 'hidden'))
                            <li class="list-group-item py-3">
                                <strong>{!! $header['label'] ?? \Illuminate\Support\Str::title($header['name']) !!}: </strong>
                                <span class="float-right">
                                    {{ $submission->renderEntryContent($header['name'], $header['type']) }}
                                </span>

                            </li>

                        @endif
                    @endforeach
                </ul>
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title font-bold underline">Détails</h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Formulaire: </strong>
                        <span class="float-right">{{ $submission->form->name }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Crée par: </strong>
                        <span class="float-right">{{ $submission->user->name ?? 'Guest' }} ({{ $submission->user->steamID }})</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Crée le: </strong>
                        <span class="float-right">{{ $submission->created_at->toDayDateTimeString() }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Mis à jour le: </strong>
                        <span class="float-right">{{ $submission->updated_at->toDayDateTimeString() }}</span>
                    </li>

                    <li class="list-group-item">
                        Définir l'état de la soumission
                        <form action="{{ route('dashboard-formbuilder::forms.submissions.update', ['fid' => $form_id, 'submission' => $submission->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            @foreach($submission->getTags() as $name => $tag)
                                <button type="submit" class=" bg-{{ $tag['color'] }} text-white" name="tag" value="{{ $name }}">{{ $tag['name'] }}</button>
                            @endforeach
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
