@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 pb-4">
        <div class="flex justify-between items-center w-full">
            <h3 class="text-grey text-sm font-normal"> <a href="/campaigns/{{$campaign->id}}/">{{$campaign->title}}</a> / Live Links</h3>
            <a href="/campaigns/{{$campaign->id}}/projects/create" class="button">New Live Link</a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($projects as $project)
            <div class="lg:w-1/3 px-3 pb-6">
                @include ('projects.card')
            </div>
        @empty
            <div>No Live Links</div>
        @endforelse
    </main>
@endsection
