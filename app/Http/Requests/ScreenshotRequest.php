<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScreenshotRequest extends FormRequest
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
        $screenshot = request()->isMethod('put') ? 'nullable|mimes:jpeg,jpg,png,gif' : 'required|mimes:jpeg,jpg,png,gif';
        return [
            'title'         => 'required|min:3|max:100',
            'subtitle'      => 'required|min:10|max:100',
            'description'   => 'required|min:10|max:191',
            'screenshot'    => $screenshot
        ];
    }
}
