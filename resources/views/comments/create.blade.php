@extends ('layouts.app')

@section('content')
    <div class="lg:w-1/2 lg:mx-auto bg-white py-12 px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Add Comment
        </h1>

        <form 
            method="POST" 
            action="/campaigns/{{$campaign->id}}/projects/{{ $project->id }}/comments/"
        >
            
            @csrf

            <div class="field mb-6">
                <label class="label text-sm mb-2 block" for="content">Commment Content</label>

                <div class="control">
                    <textarea 
                        name="content" 
                        rows="5" 
                        class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                        placeholder="Comment Content....."
                        required>{{ old('content') }}</textarea>
                </div>
            </div>            

            <div class="field mb-6">
                <label class="label text-sm mb-2 block" for="sentiment_id">Sentiment</label>

                <div class="control">
                    
                    <select name="sentiment_id" class="block appearance-none w-full bg-transparent border border-grey-light p-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="1" {{ old('sentiment_id')=="1" ? 'selected' : '' }}>Positive</option>
                        <option value="2" {{ old('sentiment_id')=="2" ? 'selected' : '' }}>Neutral</option>
                        <option value="3" {{ old('sentiment_id')=="3" ? 'selected' : '' }}>Negative</option>
                    </select>
                </div>
            </div>

            <div class="field mb-6">
                <label class="label text-sm mb-2 block" for="action_id">Action</label>

                <div class="control">
                    
                    <select name="action_id" class="block appearance-none w-full bg-transparent border border-grey-light p-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="0" {{ old('action_id')=="0" ? 'selected' : '' }}>None Needed</option>
                        <option value="1" {{ old('action_id')=="1" ? 'selected' : '' }}>borne Suggested Response</option>
                        <option value="2" {{ old('action_id')=="2" ? 'selected' : '' }}>CITB Edit</option>
                        <option value="3" {{ old('action_id')=="3" ? 'selected' : '' }}>CITB Approved</option>
                        <option value="3" {{ old('action_id')=="3" ? 'selected' : '' }}>CITB Advise Do Not Respond</option>
                    </select>
                </div>
            </div>

            <div class="field mb-6">
                <label class="label text-sm mb-2 block" for="notes">Notes</label>

                <div class="control">
                    <textarea 
                        name="notes" 
                        rows="10" 
                        class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                        placeholder="Notes..."
                        required>{{ old('notes') }}</textarea>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link mr-2">Add</button>
                    <a href="/campaigns/{{$campaign->id}}/projects/{{ $project->id }}/comments">Cancel</a>
                </div>
            </div>

            @if ($errors->any())
                <div class="field mt-6">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm text-red">{{ $error }}</li>
                    @endforeach
                </div>
            @endif

        </form>
    </div>
@endsection
