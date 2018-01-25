<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RadarsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //visi vartotojai gali vykdyti sia uzklausa
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'distance' => 'required',
            'time' => 'required',
            'number' => 'min:6 | max:6 | required',
            'date' => 'required',
        ];
    }
}
