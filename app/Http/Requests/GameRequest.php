<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class GameRequest extends FormRequest
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
        $image = request()->isMethod('put') ? 'nullable|mimes:jpeg,jpg,png,gif' : 'required|mimes:jpeg,jpg,png,gif';
        return [
            'name'          => 'required|min:3|max:40',
            'year'          => 'required|digits_between:4,4|integer',
            'category'      => 'required',
            'description'   => 'required|min:5|max:50',
            'image'         => $image
        ];
    }

}
