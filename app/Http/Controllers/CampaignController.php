<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Show the form for creating a new email campaign.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Add any necessary data you want to pass to the view
        return view('create_campaign');
    }

    /**
     * Store a newly created email campaign in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            // Add any other necessary validation rules for the form fields
        ]);


        $campaign = new Campaign;
        $campaign->subject = $request->input('subject');
        $campaign->content = $request->input('content');
        $campaign->save();


        return redirect()->route('campaigns.create')->with('success', 'Email campaign created successfully.');
    }
}
