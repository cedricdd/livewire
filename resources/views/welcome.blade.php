@extends('layouts.app')

@section('content')
    <div class="max-w-[800px] text-center mx-auto">
        @livewire('greeter')
        @livewire('search')
    </div>
@endsection
