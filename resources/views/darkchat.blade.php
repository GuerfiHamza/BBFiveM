@extends('layouts.app')

@section('title', 'Dark Chat')

@section('content')
    <section id="app">
        <darkchat />
    </section>
@endsection 

@push('js')
<script src="{{ asset('js/app.js') }}"></script>
@endpush