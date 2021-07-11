<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'          =>  'required',
            'lastName'      =>  'required',
            'address'       =>  'required',
            'phone'         =>  'required|numeric',
            'dpi'           =>  'required|numeric|digits:13',            
            'email'         =>  'required|email',
        ];
    }

    public function messages(){

        return[
            'name.required'         =>  'Los nombres son obligatorios',
            'lastName.required'     =>  'Los apellidos son obligatorios',
            'address.required'      =>  'La dirección es obligatoria',
            'phone.required'        =>  'El teléfono es obligatorio',
            'phone.numeric'         =>  'El teléfono solo debe de contener dígitos',
            'dpi.required'          =>  'El DPI es obligatorio',
            'dpi.numeric'           =>  'El DPI solo debe de contener dígitos',
            'dpi.digits'            =>  'El DPI debe de contener 13 dígitos',
            'email.required'        =>  'El Correo Electrónico es obligatorio',
            'email.email'           =>  'Debe de ingresar un correo electrónico válido',
            'email.unique'          =>  'Este correo ya que encuentra registrado en nuestro sistema, intente con otro'
        ];
    }
}
