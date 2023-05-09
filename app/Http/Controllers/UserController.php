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
use App\Mail\SendEmailUserRegister;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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

        $nombre = $request->user_first_name;
        $apellido = $request->user_last_name;
        $email = $request->email;
        $user = $nombre;


        //$nameVacant = $request->

        $mailData = [
            'email' => $email,
            'user' => $user,
            'apellido' => $apellido,

        ];

        Mail::to($email)->send(new SendEmailUserRegister($mailData));
        //return Redirect::route('company.index');

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
        $user = $request->user;
        $idVacant = $request->id;
        //$nameVacant = $request->

        $mailData = [
            'email' => $request->email,
            'user' => $request->user,
            'idVacant' => $request->idV,
            'nameOff' => $request->nameOff
            //'title' => 'Mail from Web-tuts.com',
            //'body' => 'This is for testing email using smtp.'
        ];

        Mail::to($email)->send(new SendEmail($mailData));
        return Redirect::route('company.index');
        // dd($mailData);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->user_first_name = $request->data['user_first_name'];
        $user->user_last_name = $request->data['user_last_name'];
        $user->CURP = $request->data['CURP'];
        $user->user_country_id = $request->data['user_country_id'];
        $user->user_state_id = $request->data['user_state_id'];
        $user->user_city_id = $request->data['user_city_id'];
        $user->user_address = $request->data['user_address'];
        $user->user_postal_code = $request->data['user_postal_code'];
        $user->user_phone_number = $request->data['user_phone_number'];
        $user->user_second_phone_number = $request->data['user_second_phone_number'];
        $user->email_alternative = $request->data['email_alternative'];
        $user->user_date_of_birth = $request->data['user_date_of_birth'];

        $user->save();

        return redirect()->route('user.userprofile');
    }

    public function updatePhoto(Request $request, User $user)
    {
        // Esta método puede recibir dos ripos de imagenes
        // --Foto de perfil
        // --Banner
        if ($request->file('profile_photo_path')) {
            // Si se le manda la foto de perfil entra al if
            Storage::delete('public/' . $user->profile_photo_path);
            $image = $request->file('profile_photo_path')->store('profile', 'public');

            $user->profile_photo_path = $image;
        } else {
            // Si se recibe ina imagen para el banner entra aquí
            if ($request->newPhoto) {
                Storage::delete('public/' . $user->banner_photo_path);
            }
            $image = $request->file('banner_photo_path')->store('banner', 'public');

            $user->banner_photo_path = $image;
        }

        $user->save();

        return redirect()->route('user.userprofile');
    }

    public function updatePassword(Request $request, User $user)
    {
        if (!Hash::check($request[0]['password'], $user->password)) return false;

        $user->password = $request[1]['password'];

        $user->save();

        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('/');
    }
}
