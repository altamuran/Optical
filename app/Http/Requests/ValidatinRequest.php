<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatinRequest extends FormRequest
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
            

     return [   'codice_cliente'=> 'required|numeric|max:5000',
                'ragione_sociale'=>'required|string|max:100',
                'sfero_sx'=>'required|numeric|max:50|min:-50',
                'sfero_dx'=>'required|numeric|max:50|min:-50',

                
            ];   

    }


}
