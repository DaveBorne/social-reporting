@extends ('layouts.app')

@section('content')

    <div class="lg:w-1/2 lg:mx-auto bg-white py-12 px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            New Live Link
        </h1>

        <form 
            method="POST" 
            action="/campaigns/{{$campaign->id}}/projects"
        >
            @include ('projects.form', [
                'project' => new App\Project,
                'buttonText' => 'Create'
            ])
        </form>
    </div>
@endsection
