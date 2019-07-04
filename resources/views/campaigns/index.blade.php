@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 pb-4">
        <div class="flex justify-between items-center w-full">
            <h3 class="text-grey text-sm font-normal">Campaigns</h3>
            <a href="/campaigns/create" class="button">New Campaign</a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($campaigns as $campaign)
            <div class="lg:w-1/3 px-3 pb-6">
                @include ('campaigns.card')
            </div>
        @empty
            <div>No Live Links</div>
        @endforelse
    </main>
@endsection
