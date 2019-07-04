<div class="card mt-3">
    <ul class="text-xs list-reset">
        @foreach ($campaign->activity as $activity)
            <li class="{{ $loop->last ? '' : 'mb-1' }}">                                
                @include ("campaigns.activity.{$activity->description}")
                <span class="text-grey">{{ $activity->created_at->diffForHumans(null, true) }}</span>
            </li>
        @endforeach
    </ul>
</div>
