<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateImageRequest extends FormRequest
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
         'description' =>['required','max:800']
       ];
     }

     public function colours()
     {
       return ['description.required'=>'Debe ingresar un nombre',
          'description.max'=>'No puede superar los 80 caracteres'];
     }
}
