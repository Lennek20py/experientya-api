<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Cv;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function miCv()
    {
        return Inertia::render('User/MiCV');
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
    public function store(StoreUserRequest $request)
    {
        $image = $request->file('profile_photo_path')->store('profile', 'public');

        $user = User::create([
            'user_first_name' => $request->user_first_name,
            'user_last_name' => $request->user_last_name,
            'CURP' => $request->CURP,
            'email' => $request->email,
            'password' => $request->password,
            'profile_photo_path' => $image,
            'user_state_id' => $request->user_state_id,
            'user_city_id' => $request->user_city_id,
            'user_address' => $request->user_address,
            'user_postal_code' => $request->user_postal_code,
            'user_phone_number' => $request->user_phone_number,
            'email_alternative' => $request->email_alternative,
            'user_date_of_birth' => $request->user_date_of_birth,
            // 'user_social_networks' => $request->user_social_networks,
            // 'user_country_id' => $request->user_country_id,
            // 'terms' => $request->terms
            // 'password_confirmation' => $request->password_confirmation,
        ]);

        Cv::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    //Function send email vacant
    public function sendEmail(Request $request)
    {
        $email = $request->email;
        $user= $request->user;
        $mailData = [
            'email'=> $request->email,
            'user'=> $request->user,
            //'title' => 'Mail from Web-tuts.com',
            //'body' => 'This is for testing email using smtp.'
        ];

        Mail::to($email)->send(new SendEmail($mailData));
        return Redirect::route('company.index');
        //dd($email);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
