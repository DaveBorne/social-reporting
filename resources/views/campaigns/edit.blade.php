@extends ('layouts.app')

@section('content')
    <div class="lg:w-1/2 lg:mx-auto bg-white py-12 px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Edit Live Link
        </h1>

        <form 
            method="POST" 
            action="{{ $campaign->path() }}"
        >
            @method('PATCH')
            @include ('campaigns.form-edit', [
                'buttonText' => 'Update Campaign'
            ])
        </form>
    </div>
@endsection
