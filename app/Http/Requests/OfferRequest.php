<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()  //method to do the validation and make rules
    {
        return [
            'offer' =>'required|max:100|unique:offers,name',   // 'inputs'=>'validate:table,column'
            'price'=>'required'
        ];
    }

    public function messages()
    {
        return ['offer.required'=> __('messages.please insert your offer'),  //to translate the message into page language that appear in lang/ar/messages
            'price'=> trans('messages.insert the price first')
    ];
    }
}
