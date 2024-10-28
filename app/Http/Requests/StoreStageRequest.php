<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_en' => 'required|unique:stages,name',
            'name_ar' => 'required|unique:stages,name',
            'notes' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            // the validation attribute inside the trans function is name of the lang file.
            'name.required' => trans('vaildation.required'),
        ];
    }
}
