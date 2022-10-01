@extends('formbuilder::layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        Soumission {{ $submission->id }} pour le formulaire {{ $submission->form->name }}
                        
                        <div class="btn-toolbar float-right" role="toolbar">
                            <div class="btn-group" role="group" aria-label="First group">
                                <a href="{{ route('formbuilder::forms.submissions.index', $submission->form->id) }}" class="btn btn-primary float-md-right btn-sm" title="Retourner aux soumissions">
                                    <i class="fa fa-arrow-left"></i> 
                                </a>
                                <form action="{{ route('formbuilder::forms.submissions.destroy', [$submission->form, $submission]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                    @csrf 
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm rounded-0 confirm-form" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Supprimer la soumission" title="Êtes-vous sur de supprimer la soumission?">
                                        <i class="fa fa-trash-o"></i> 
                                    </button>
                                </form>
                            </div>
                        </div>
                    </h5>
                </div>

                <ul class="list-group list-group-flush">
                    @foreach($form_headers as $header)
                        <li class="list-group-item">
                            <strong>{{ $header['label'] ?? title_case($header['name']) }}: </strong> 
                            <span class="float-right">
                                {{ $submission->renderEntryContent($header['name'], $header['type']) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Details</h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Formulaire: </strong> 
                        <span class="float-right">{{ $submission->form->name }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Soumis par: </strong> 
                        <span class="float-right">{{ $submission->user->name ?? 'Guest' }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Mis à jour le: </strong> 
                        <span class="float-right">{{ $submission->updated_at->toDayDateTimeString() }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Soumis le: </strong> 
                        <span class="float-right">{{ $submission->created_at->toDayDateTimeString() }}</span>
                    </li>
                    <li class="list-group-item">
                        Définir l'état de la soumission
                        <form action="{{ route('formbuilder::forms.submissions.update', ['form_id' => $form_id, 'submission_id' => $submission->id]) }}" method="post">
                            @csrf
                            @foreach($submission->tags as $name => $tag)
                                <button type="submit" class="btn btn-{{ $tag['color'] }}" name="tag" value="{{ $name }}">{{ $tag['name'] }}</button>
                            @endforeach
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
