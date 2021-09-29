<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainSectionRequest extends FormRequest
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
            'title_1' => 'max:25',
            'title_2' => 'max:25',
            'photo' => 'mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'photo.mimes' => 'الأمتدادات المسموح بها jpg, jpeg, png',
            'max' => 'لقد تخطيت الحد الأقصي للكلمات والحروف والأرقام',
        ];
    }
}
