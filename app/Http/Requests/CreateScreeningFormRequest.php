<?php

namespace App\Http\Requests;

use App\Enum\HeadacheDailyFrequencyType;
use App\Enum\HeadacheFrequencyType;
use Carbon\Carbon;
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
            'dob' => ['required', 'date', 'before_or_equal:'. Carbon::now()->subYears(18)->format('Y-m-d')],
            'headache_frequency_type' => ['required', 'int', new Enum(HeadacheFrequencyType::class)],
            'daily_headache_frequency' => ['required_if:headache_frequency_type,'.HeadacheFrequencyType::daily->value, new Enum(HeadacheDailyFrequencyType::class)],
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
            'daily_headache_frequency.required_if' => 'The daily headache frequency field is required when headache frequency type is '.HeadacheFrequencyType::daily->label(),
            'dob.before_or_equal' => 'The participant(s) must be over 18 years of age.',
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
