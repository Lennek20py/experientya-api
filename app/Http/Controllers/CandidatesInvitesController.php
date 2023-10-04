<?php

namespace App\Http\Controllers;

use App\Mail\SendInviteCandidate;
use App\Models\CandidatesInvite;
use App\Models\Company;
use App\Models\Cv;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class CandidatesInvitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = CandidatesInvite::where('company_id', $request->query('company'))
            ->where('offer_id', $request->query('offer'))
            ->with(['offers', 'cvid.user', 'company']);
        if ($data->count() === 0) {
            return response()->json(['status' => 'error', 'data' => 'Not found Candidates invites']);
        }
        return response()->json(['status' => 'success', 'data' => $data->get()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCandidates(Request $request)
    {
        $query = $request->query('vacant');
        $firstWord = explode(" ", $query);
        if (!empty($query)) {
            $results = cv::where(function ($q) use ($query, $firstWord) {
                $q->where('position', 'like', "%$firstWord[0]%");
                $q->orWhere('position', 'like', "%$query%");
            })->get();
        } else {
            $results = cv::with('user')->get();
        }
        return $results;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allInvites()
    {
        $data = CandidatesInvite::with('offers')
            ->with('company')
            ->with('cvid')
            ->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // This function applies if it's a brand new invitation
        $previousInvitations = CandidatesInvite::where('cv_id', $request->cv_id)
            ->where('offer_id', $request->offer_id)
            ->where('status', 'invited')
            ->get();
        if (count($previousInvitations) > 0) {
            return response()->json(['status' => 'Already invited']);
        }

        $companyInfo = Company::find($request->company_id);
        $cvInfo = Cv::find($request->cv_id);
        $offerInfo = Offer::find($request->offer_id);

        if (isset($companyInfo) && isset($cvInfo) && isset($offerInfo)) {
            $invite = CandidatesInvite::create([
                'cv_id' => $cvInfo->id,
                'offer_id' => $offerInfo->id,
                'company_id' => $companyInfo->id,
                'status' => 'invited'
            ]);

            $mailData = [
                'email' => $cvInfo->user->email,
                'user' => $cvInfo->user,
                'company' => $companyInfo,
                'idVacant' => $offerInfo->id,
                'offer' => $offerInfo,
                'nameOff' => $offerInfo->title
            ];
            Mail::to($cvInfo->user->email)->send(new SendInviteCandidate($mailData));
            return Redirect::route('company.index');
            // return response()->json(['status' => 'Invited succesfully', 'data' => $invite]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CandidatesInvite  $candidatesInvite
     * @return \Illuminate\Http\Response
     */
    public function show(CandidatesInvite $candidatesInvite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CandidatesInvite  $candidatesInvite
     * @return \Illuminate\Http\Response
     */
    public function edit(CandidatesInvite $candidatesInvite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CandidatesInvite  $candidatesInvite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CandidatesInvite $candidatesInvite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CandidatesInvite  $candidatesInvite
     * @return \Illuminate\Http\Response
     */
    public function destroy(CandidatesInvite $candidatesInvite)
    {
        //
    }
}
