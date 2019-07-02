@csrf

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="platform_id">Platform</label>

    <div class="control">
	    
		<select name="platform_id" class="block appearance-none w-full bg-transparent border border-grey-light p-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
			<option value="1" {{ $project->platform_id=="1" ? 'selected' : '' }}>Facebook</option>
			<option value="2" {{ $project->platform_id=="2" ? 'selected' : '' }}>Twitter</option>
			<option value="3" {{ $project->platform_id=="3" ? 'selected' : '' }}>LinkedIn</option>
			<option value="4" {{ $project->platform_id=="4" ? 'selected' : '' }}>Instagram</option>
		</select>
        
</div>
</div>

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Title</label>

    <div class="control">
        <input 
            type="text" 
            class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full" 
            name="title" 
            placeholder="My next awesome project"
            required
            value="{{ $project->title }}">
    </div>
</div>

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="link">URL</label>

    <div class="control">
        <input 
            type="text" 
            class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full" 
            name="url" 
            placeholder="http://wwww......"
            required
            value="{{ $project->url }}">
    </div>
</div>

<div class="field mb-6 w-half">
    <label class="label text-sm mb-2 block" for="start_date">Start Date (dropdown to be added)</label>

    <div class="control">
        <input 
            type="text" 
            class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full" 
            name="start_date" 
            placeholder="00/00/0000"
            required
            value="{{ $project->start_date }}">
    </div>
</div>

<div class="field mb-6 w-half">
    <label class="label text-sm mb-2 block" for="end_date">End Date (dropdown to be added)</label>

    <div class="control">
        <input 
            type="text" 
            class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full" 
            name="end_date" 
            placeholder="00/00/0000"
            required
            value="{{ $project->end_date }}">
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
            required>{{ $project->notes }}</textarea>
    </div>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="button is-link mr-2">{{ $buttonText }}</button>
        <a href="{{ $project->path() }}">Cancel</a>
    </div>
</div>

@if ($errors->any())
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li class="text-sm text-red">{{ $error }}</li>
        @endforeach
    </div>
@endif
