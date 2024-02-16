<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeAsksRequest extends FormRequest
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
            'description' => '',
            'image' => '',
            'who_will_answer'=> 'required|in:Engineering,Medicine,Computer Science,Mathematics,Psychology,Economics,Law,Chemistry,Business,Dentistry,Nursing,Life Sciences,Public Health,Veterinary,Pharmacy,Clinical Medicine,Biotechnology,International Relations',
        ];
    }
}
