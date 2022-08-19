<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
            'title' => 'required',
            'title_job' => 'required',
            'description' => 'required',
            'type_job' => 'required',
            'type_horary' => 'required',
            'type_of_contract' => 'required',
            'profile_description' => 'required',
            'start_date' => 'required',
            'salary' => 'required',
            'payment_type' => 'required',
            'offer_address' => 'required',
            'state_id' => 'required',
            'town_id' => 'required',
            'area_id' => 'required',
            'general_id' => 'required',
            'specific_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'titulo de la vacante',
            'title_job' => 'titulo del puesto',
            'description' => 'descripción del puesto',
            'type_job' => 'tipo de trabajo',
            'type_horary' => 'tipo de horario',
            'type_of_contract' => 'tipo de contrato',
            'profile_description' => 'pérfil del solicitante ',
            'start_date' => 'fecha de inicio',
            'salary' => 'salario del puesto',
            'payment_type' => 'tipo de pago',
            'offer_address' => 'dirección',
            'state_id' => 'estado',
            'town_id' => 'ciudad o municipio',
            'area_id' => 'área',
            'general_id' => 'área general',
            'specific_id' => 'área específica'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Debe ingresar titulo de la vacante',
            'title_job.required' => 'Debe ingresar el titulo del puesto ',
            'description.required' => 'Debe ingresar la descripción de la vacante',
            'type_job.required' => 'Debe ingresar el tipo de trabajo',
            'type_horary.required' => 'Debe ingresa el tipo de horario',
            'type_of_contract.required' => 'Debe ingresar el tipo de contrato',
            'profile_description.required' => 'Debe ingresar la descripción del pérfil',
            'start_date.required' => 'Debe ingresar la fecha de inicio de la vacante',
            'salary.required' => 'Debe ingresar el salario de la vacante',
            'payment_type.required' => 'Debe ingresar el tipo de pago',
            'offer_address.required' => 'Debe ingresar la dirección de la vacante',
            'state_id.required' => 'Debe seleccionar un Estado',
            'town_id.required' => 'Debe seleccionar una Ciudad o Municipio',
            'area_id.required' => 'Debe seleccionar un área',
            'general_id.required' => 'Debe seleccionar un área general',
            'specific_id.required' => 'Debe seleccionar un área específica'
        ];
    }
}
