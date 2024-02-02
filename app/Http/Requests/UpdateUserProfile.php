<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class UpdateUserProfile extends FormRequest
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
            'email' => 'required|unique:users|email',

            'name' => [
                'required',
                'max:60',
                new AlphaSpaces()
            ],
            'phone' => ['min:6'],

            'avatar' => ['nullable','file','image']

        ];
    }

    public function messages()
    {

        if(Request::get('email') === Auth::user()->email){
            return [
                'email.unique' => 'Podano ten sam adres email',
                'name.max' => 'Maksymalna ilosc znakow to: :max'
            ];
        } else {
            return [
                'email.unique' => 'Podany Adres emaill jest zajet :)',
                'name.max' => 'Maksymalna ilosc znakow to: :max'
            ];
        }

    }
}
