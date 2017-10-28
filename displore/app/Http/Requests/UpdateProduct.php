<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();

        if($user->paypal !== ""){
            return true;
        }else{
            return false;
        }
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:30',
            'description' => 'required',
            'category' => 'required',
            'location' => 'required',
            'price' => 'required|numeric',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'price_time' => 'required'
        ];
    }
}
