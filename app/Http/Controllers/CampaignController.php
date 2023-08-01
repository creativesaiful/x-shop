<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
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
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',

        ]);


        $campaign = new Campaign();
        $campaign->subject = $request->input('subject');
        $campaign->content = $request->input('content');

        $campaign->save();


        return redirect()->route('campaigns.create')->with('success', 'Email campaign created successfully.');
    }
}
