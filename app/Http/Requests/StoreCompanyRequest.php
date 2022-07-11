<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'company_name' => 'required',
            'email' => 'required',
            'password' => 'required|required_with:password_confirmation|same:password_confirmation|min:6',
            'password_confirmation' => 'required|required_with:password|same:password|min:6',
            'company_phone_number' => 'required',
            'company_address' => 'required',
            'company_fiscal_address' => 'required',
            'company_postal_code' => 'required',
            'RFC' => 'required',
            'responsible_first_name' => 'required',
            'responsible_last_name' => 'required',
            'responsible_phone_number' => 'required',
            'state_id' => 'required',
            'town_id' => 'required',
            'sector_id' => 'required',
            'description' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'company_name' => 'nombre de la empresa',
            'password' => 'contraseña',
            'password_confirmation' => 'contraseña',
            'company_phone_number' => 'número de la empresa',
            'company_address' => 'dirección',
            'company_fiscal_address' => 'dirección fiscal',
            'company_postal_code' => 'código postal',
            'RFC' => 'RFC',
            'responsible_first_name' => 'nombre(s)',
            'responsible_last_name' => 'apellidos',
            'responsible_phone_number' => 'número de celular',
            'state_id' => 'estado',
            'town_id' => 'ciudad o municipio',
            'sector_id' => 'sector',
            'description' => 'descripción'
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'Debe ingresar el nombre de la empresa',
            'email.required' => 'Debe ingresar el email de la empresa',
            'password.required' => 'Debe ingresar una contraseña',
            'password.same' => 'Las contraseñas deben de coincidir',
            'password_confirmation.required' => 'Debe ingresar una contraseña',
            'password_confirmation.same' => 'Las contraseñas deben de coincidir',
            'company_phone_number.required' => 'Debe ingresar el número teléfonico',
            'company_address.required' => 'Debe ingresar la dirección',
            'company_fiscal_address.required' => 'Debe ingresar la dirección fiscal',
            'company_postal_code.required' => 'Debe de ingresar código postal',
            'RFC.required' => 'Debe ingresar el RFC',
            'responsible_first_name.required' => 'Debe ingresar su nombre',
            'responsible_last_name.required' => 'Debe ingresar sus apellidos',
            'responsible_phone_number.required' => 'Debe ingresar su número de celular',
            'state_id.required' => 'Debe ingresar el estado',
            'town_id.required' => 'Debe ingresar la ciudad o municipio',
            'sector_id.required' => 'Debe ingresar el sector',
            'description.required' => 'Debe ingresar algúna descripción'
        ];
    }
}
