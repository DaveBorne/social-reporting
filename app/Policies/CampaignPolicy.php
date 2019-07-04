<?php

namespace App\Policies;

use App\User;
use App\Campaign;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampaignPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Campaign $campaign)
    {
        return $user->is($campaign->owner) || $campaign->members->contains($user);
    }
}
