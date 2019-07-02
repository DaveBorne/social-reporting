@extends('layouts.app')

@section('content')

		    <h3>{{ $project->title }}</h3>


    <header class="flex items-center mb-3 pb-4">
        <div class="flex justify-between items-center w-full">
            <h3 class="text-grey text-sm font-normal">Live Links</h3>
            <a href="/projects/{{ $project->id }}/comments/create" class="button">New Comment</a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
    </main>
@endsection
