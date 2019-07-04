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
					<a href="{{ $project->path() . '/edit' }}" class="button mt-2">Edit</a>

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
                    <h2 class="text-lg text-grey font-normal mb-3">Comments</h2>

                    {{-- tasks --}}
                    @foreach ($project->tasks as $task)
                        <div class="card mb-3">
                            <form method="POST" action="{{ $task->path() }}">
                                @method('PATCH')
                                @csrf

                                <div class="flex">
                                    <input name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-grey' : '' }}">
                                    <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
							<div class="card mb-3">
	                            <input placeholder="Add a new comment..." class="w-full" name="body">
                            </div>
                            <button type="submit" class="button">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
