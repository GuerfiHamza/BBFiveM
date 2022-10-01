@extends('dashboard.layouts.app')

@section('title', 'Tous nos formulaires')

@section('content_header')
    <h1>Les formulaires</h1>
@stop

@section('content')

<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ $pageTitle }}
    </h2>
      
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto  bg-gray-300 dark:bg-gray-800">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-300 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">Etat</th>
                        <th class="px-4 py-3">Actions</th>
                        
                    </tr>
                </thead>
                <tbody class=" divide-y dark:divide-gray-700 ">
                   
                    @foreach($submissions as $submission)
                        <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ $submission->id }}
                                </td>
                           
                            <td class="px-4 py-3 text-sm">
                                {{ $submission->user->name ?? 'n/a' }}
                            </td>
                        <td class="px-4 py-3 text-sm"><span class="badge bg-{{ $submission->getTagColor() }} text-white">{{ $submission->getTagName() }}</td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center ">
                            <a href="{{ route('dashboard-formbuilder::forms.submissions.show', [$form, $submission->id]) }}" class="btn btn-primary btn-sm mr-5" title="View submission">
                                <i class="fa fa-eye w-5 h-5"></i>
                            </a>

                            <form action="{{ route('dashboard-formbuilder::forms.submissions.destroy', [$form, $submission]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm confirm-form" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete this submission?" title="Delete submission">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
                            
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{-- {{ $submissions->links() }} --}}
    </div>
</div>


@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop

@section('js')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#form-table').DataTable();
    });
</script>
@stop
