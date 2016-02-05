<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class storePlaythroughRequest extends Request
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
        $rules = [
            'game' => 'required',
            'daterange' => 'required',
            'timerange' => 'required',
            'players' => 'required|min:2',
            'winners' => 'required|min:1'
        ];

        $userArr = explode(',', $this->request->get('players')); 
        foreach( $userArr as $key => $val ){
            $rules['person-'.$val] = 'required';
        }

        return $rules;
    }
}
