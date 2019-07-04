@extends('layouts.app')

@section('content')

	<h2><a href="/campaigns/{{$campaign->id}}/projects/{{ $project->id }}/">{{ $project->title }}</a></h3>


    <header class="flex items-center mb-3 pb-4">
        <div class="flex justify-between items-center w-full">
            <h3 class="text-grey text-sm font-normal">Live Links</h3>
            <a href="/campaigns/{{$campaign->id}}/projects/{{ $project->id }}/comments/create" class="button">New Comment</a>
        </div>
    </header>

    <main>
    	<div class="lg:w-full mb-6">
	        @forelse ($comments as $comment)

	            <div class="card mb-3">
	                <h4>{{ $comment->content }}</h4>
                    <p><span class="text-grey">Sentiment :</span>@if ($comment->sentiment_id == 1)Positive @elseif($comment->sentiment_id == 2)Neutral @elseif($comment->sentiment_id == 3)Negative @endif
                     <span class="text-grey">// 
                     Action : </span> @if ($comment->action_id == 0)None Needed @elseif($comment->action_id == 1)borne Suggested Response @elseif($comment->action_id == 2)CITB Edit @elseif($comment->action_id == 3)CITB Approved @elseif($comment->action_id == 4)No Response Needed @endif
                      <span class="text-grey">// 
                    Notes : </span>{{ $comment->notes }}</p>

                    <div class="lg:w-full mt-6">
                        <a href="/campaigns/{{$campaign->id}}/projects/{{ $project->id }}/comments/{{ $comment->id }}/edit" class="button">Edit Comment</a>
                        <form method="POST" action="/campaigns/{{$campaign->id}}/projects/{{ $project->id }}/comments/{{ $comment->id }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="button is-danger mr-2" onclick="return confirm('Are you sure? - this will also delete all comments and responses');">Delete</button>
                        </form>
                    </div>
                    


                    



                     <h3>Responses to Comment</h3>

                    @foreach ($comment->responses as $response)
                        <div class="card mb-3">

                            <h4>{{ $response->content }}</h4>
                            <p><span class="text-grey">Sentiment :</span>@if ($response->sentiment_id == 1)Positive @elseif($response->sentiment_id == 2)Neutral @elseif($response->sentiment_id == 3)Negative @endif
                             <span class="text-grey">// 
                             Action : </span> @if ($response->action_id == 0)None Needed @elseif($response->action_id == 1)borne Suggested Response @elseif($response->action_id == 2)CITB Edit @elseif($response->action_id == 3)CITB Approved @elseif($response->action_id == 4)No Response Needed @endif
                              <span class="text-grey">// 
                            Notes : </span>{{ $response->notes }}</p>

                            <div class="lg:w-full mt-6">
                                <a href="/campaigns/{{$campaign->id}}/projects/{{ $project->id }}/comments/{{ $comment->id }}/responses/{{ $response->id }}/edit" class="button">Edit Response</a>
                                <form method="POST" action="/campaigns/{{$campaign->id}}/projects/{{ $project->id }}/comments/{{ $comment->id }}/responses/{{ $response->id }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="button is-danger mr-2" onclick="return confirm('Are you sure?');">Delete</button>
                                </form>
                            </div>

                        </div>
                    @endforeach

                    <div class="card mb-3">

                        <h3>Add new response</h3>

                    <form method="POST" action="/campaigns/{{$campaign->id}}/projects/{{ $project->id }}/comments/{{ $comment->id }}/responses/">
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




	            </div>

	        @empty
	            <div>No Comments</div>
	        @endforelse
    	</div>
    </main>

@endsection
