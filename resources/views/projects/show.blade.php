@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 pb-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-grey text-sm font-normal">
                <a href="/projects" class="text-grey text-sm font-normal no-underline hover:underline">Live Links</a>
                / {{ $project->title }}
            </p>

            
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h1 class="text-xxl font-normal mb-3">{{ $project->title }}</h1>
					<div class="card mb-3">
						<p class="mb-2"><span class="text-grey">Platform:</span> @if ($project->platform_id == 1)Facebook @elseif($project->platform_id == 2)Twitter @elseif($project->platform_id == 3)LinkedIn @elseif($project->platform_id == 4)Instagram @endif</p>
						<p class="mb-2"><span class="text-grey">URL:</span> <a href="{{ $project->url }}" target="_blank">{{ $project->url }}</a></p>
						<p class="mb-2"><span class="text-grey">Start Date:</span> {{ $project->start_date }}</p>
						<p class="mb-4"><span class="text-grey">End Date:</span> {{ $project->end_date }}</p>
						<p class="mb-2 text-grey">Notes:</p><p>{{ $project->notes }}</p>
					</div>
					<a href="/campaigns/{{$campaign->id}}/projects/{{ $project->id}}/edit" class="button mt-2">Edit</a>

                    <form method="POST" action="/campaigns/{{$campaign->id}}/projects/{{ $project->id }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="button is-danger mr-2" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>


                </div>
            </div>

            <div class="lg:w-1/4 px-3 mb-6">
                <h2 class="text-lg font-normal font-grey mb-3">Activity</h2>
                @include ('projects.activity.card')
            </div>
        </div>
        <div class="lg:flex -mx-3">
            <div class="lg:w-full px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-lg text-grey font-normal mb-3">Comments</h2> <a href="/campaigns/{{$campaign->id}}/projects/{{ $project->id }}/comments" class="button">View Comments</a>
                </div>
            </div>
        </div>
    </main>
@endsection
