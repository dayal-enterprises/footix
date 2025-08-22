<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeamRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Le nom est requis.",
            'name.string' => "Le nom n'est pas valide.",
            'name.min' => "Le nom doit contenir entre 2 et 255 caractères..",
            'name.max' => "Le nom doit contenir entre 2 et 255 caractères..",
        ];
    }
}
