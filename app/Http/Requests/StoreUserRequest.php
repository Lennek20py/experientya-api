<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_first_name' => 'required',
            'user_last_name' => 'required',
            'CURP' => 'required',
            'email' => 'required|email:filter',
            'password' => 'required|required_with:password_confirmation|same:password_confirmation|min:6',
            'password_confirmation' => 'required|required_with:password|same:password|min:6',
            'profile_photo_path' => 'required',
            'terms' => 'required',
            'user_country_id' => 'required',
            'user_state_id' => 'required',
            'user_city_id' => 'required',
            'user_address' => 'required',
            'user_social_networks' => 'required',
            'user_postal_code' => 'required',
            'user_phone_number' => 'required',
            'email_alternative' => 'required',
            'user_date_of_birth' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'user_first_name' => 'nombre(s) del candidato',
            'user_last_name' => 'apellidos del candidato',
            'CURP' => 'CURP (clave única de registro de población) del candidato',
            'email' => 'email del candidato',
            'password' => 'contraseña',
            'password_confirmation' => 'repetir la contraseña',
            'profile_photo_path' => 'foto de perfil',
            'terms'  => 'Términos y condiciones',
            'user_country_id' => 'país',
            'user_state_id' => 'estado',
            'user_city_id' => 'ciudad o municipio',
            'user_address' => 'dirección del candidato',
            'user_social_networks' => 'required',
            'user_postal_code' => 'código postal del candidato',
            'user_phone_number' => 'telefono del candidato',
            'email_alternative' => 'email alternativo del candidato',
            'user_date_of_birth' => 'fecha de nacimiento del candidato',
            
        ];
    }

    public function messages()
    {
        return [
            'user_first_name.required' => 'Debe ingresar el/los nombres del candidato',
            'user_last_name.required' => 'Debe ingresar los apellidos del candidato',
            'CURP.required' => 'Debe ingresar la CURP (clave única de registro de población) del candidato',
            'email.required' => 'Debe ingresar el Email del candidato',
            'password.required' => 'Debe ingresar una contraseña',
            'password.same' => 'Las contraseñas deben coincidir',
            'password_confirmation.required' => 'Debe ingresar una contraseña',
            'password_confirmation.same' => 'Las contraseñas deben coincidir',
            'profile_photo_path.required' => 'Debe insertar una foto de perfil',
            'terms.required'  => 'Debe aceptar los términos y condiciones',
            'user_country_id.required' => 'Debe ingresar el país del candidato',
            'user_state_id.required' => 'Debe ingresar el estado del candidato',
            'user_city_id.required' => 'Debe ingresar la ciudad o municipio del candidato',
            'user_address.required' => 'Debe ingresar la dirección del candidato',
            'user_social_networks.required' => 'Debe ingresar una/más redes sociales del candidato',
            'user_postal_code.required' => 'Debe ingresar el código postal del candidato',
            'user_phone_number.required' => 'Debe ingresar el teléfono del candidato',
            'email_alternative.required' => 'Debe ingresar un Email alternativo del candidato',
            'user_date_of_birth.required' => 'Debe ing resar la fecha de nacimiento del candidato',
            
        ];
    }
}
