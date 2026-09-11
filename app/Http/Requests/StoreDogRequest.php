<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDogRequest extends FormRequest
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
            'name_affix' => 'required|string|max:255',
            'common_name' => 'required|string|max:255',
            'sex' => 'required|in:male,female',
            'identification_number' => 'required|string',
            'LOF' => 'required|boolean',
            'cotation' => 'nullable|string|max:255',
            'color' => 'required|string|max:255',
            'birth_date' => 'required|date|before_or_equal:today',
            'breed_id' => 'required|exists:breeds,id',
            'retirement' => 'nullable|boolean',
            'description' => 'nullable|string',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pictures' => 'nullable|array',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_external' => 'nullable|boolean',
        ];
    }
}
