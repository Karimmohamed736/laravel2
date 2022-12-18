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
            'offer_ar' =>'required|max:100|unique:offers,name_ar',   // 'inputs'=>'validate:table,column'
            'offer_en' =>'required|max:100|unique:offers,name_en',   // 'inputs'=>'validate:table,column'
            'price'=>'required'
        ];
    }

    public function messages()
    {
        return [
        'name_ar.required'=> __('messages.please insert your offer'),  //to translate the message into page language that appear in lang/ar/messages
        'name_en.required'=> __('messages.please insert your offer'),    
        'price'=> trans('messages.insert the price first'),
        'photo'=> __('message.Missing inputs'),
    ];
    }
}
