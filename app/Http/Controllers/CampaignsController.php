<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Campaign;

use App\Http\Requests\UpdateCampaignRequest;

class CampaignsController extends Controller
{
    public function index()
    {
        
        $campaigns = Campaign::all();
        return view('campaigns.index', compact('campaigns'));   
    }

    public function show(Campaign $campaign)
    {   
        $campaigns = Campaign::all();
        return view('campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store()
    {
        // validate
        // persist
        $campaign = auth()->user()->campaigns()->create($this->validateRequestNew());

        return redirect($campaign->path());
    }

/*
    public function edit(Campaign $campaign)
    {
        return view('campaigns.edit', compact('campaign'));
    }

    public function update(Campaign $campaign)
    {

        //$updateCampaign = $this->validateRequest();
        $campaignUpdated = $campaign->update($this->validateRequest());
        return redirect($campaign->path());
    }

    public function destroy(Campaign $campaign)
    {
        $this->authorize('update', $campaign);

        $campaign->delete();

        return redirect('/campaigns');
    }
*/
    protected function validateRequestNew()
    {
        return request()->validate([
            'title' => 'required|min:3',
            'active' => 'nullable|min:1|max:1',
            'notes' => 'nullable|min:3'
        ]);
    }
}
