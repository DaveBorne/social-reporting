<div class="card" style="height: 200px">
	
    <div class="text-grey mb-4">
		@if ($project->platform_id == 1)
		    Facebook
		@elseif($project->platform_id == 2)
		    Twitter
		@elseif($project->platform_id == 3)
		    LinkedIn
		@elseif($project->platform_id == 4)
		    Instagram
		@endif	    
	</div>
	
    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
        <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a>
    </h3>

    <div class="text-grey mb-4">{{ $project->url }}</div>

</div>
