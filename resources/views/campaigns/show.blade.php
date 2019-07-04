@extends ('layouts.app')

@section('content')
    <header class="flex items-center mb-3 pb-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-grey text-sm font-normal">
                <a href="/campaigns" class="text-grey text-sm font-normal no-underline hover:underline">Live Links</a>
                / {{ $campaign->title }}
            </p>

            
        </div>
    </header>



        @forelse ($campaign->project as $project)
            <div class="lg:w-1/3 px-3 pb-6">
                TEST
            </div>
        @empty
            <div>No Live Links</div>
        @endforelse


    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h1 class="text-xxl font-normal mb-3">{{ $campaign->title }}</h1>
					<div class="card mb-3">
						<p class="mb-2"><span class="text-grey">Platform:</span> @if ($campaign->platform_id == 1)Facebook @elseif($campaign->platform_id == 2)Twitter @elseif($campaign->platform_id == 3)LinkedIn @elseif($campaign->platform_id == 4)Instagram @endif</p>
						<p class="mb-2"><span class="text-grey">URL:</span> <a href="{{ $campaign->url }}" target="_blank">{{ $campaign->url }}</a></p>
						<p class="mb-2"><span class="text-grey">Start Date:</span> {{ $campaign->start_date }}</p>
						<p class="mb-4"><span class="text-grey">End Date:</span> {{ $campaign->end_date }}</p>
						<p class="mb-2 text-grey">Notes:</p><p>{{ $campaign->notes }}</p>
					</div>
					<a href="{{ $campaign->path() . '/edit' }}" class="button mt-2">Edit</a>

                    <form method="POST" action="/campaigns/{{ $campaign->id }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="button is-danger mr-2" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>


                </div>
            </div>


        </div>
        <div class="lg:flex -mx-3">
            <div class="lg:w-full px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-lg text-grey font-normal mb-3">Comments</h2> <a href="/campaigns/{{ $campaign->id }}/comments" class="button">View Comments</a>
                </div>
            </div>
        </div>
    </main>
@endsection
