<?php

namespace App\Http\Requests;

use App\Enum\HeadacheDailyFrequencyType;
use App\Enum\HeadacheFrequencyType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateScreeningFormRequest extends FormRequest
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
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:100'],
            'dob' => ['required', 'date', 'before_or_equal:today'],
            'headache_frequency_type' => ['required', 'int', new Enum(HeadacheFrequencyType::class)],
            'headache_daily_frequency' => ['nullable', 'int', new Enum(HeadacheDailyFrequencyType::class)],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'headache_daily_frequency.required_if' => 'The daily headache frequency field is required when headache frequency type is '.HeadacheFrequencyType::daily->label(),
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'dob' => 'date of birth',
            'headache_daily_frequency' => 'daily headache frequency',
        ];
    }
}
