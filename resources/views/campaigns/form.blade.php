@csrf

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Title</label>

    <div class="control">
        <input 
            type="text" 
            class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full" 
            name="title" 
            placeholder="My next awesome campaign"
            required
            value="{{ old('title') }}">
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

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="active">Is The Campaign Active?</label>

    <div class="control">
	    
		<select name="active" class="block appearance-none w-full bg-transparent border border-grey-light p-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
			<option value="1" {{ old('active')=="1" ? 'selected' : '' }}>Yes</option>
			<option value="0" {{ old('active')=="2" ? 'selected' : '' }}>No</option>
		</select>
        
    </div>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="button is-link mr-2">{{ $buttonText }}</button>
        <a href="{{ $campaign->path() }}">Cancel</a>
    </div>
</div>

@if ($errors->any())
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li class="text-sm text-red">{{ $error }}</li>
        @endforeach
    </div>
@endif
