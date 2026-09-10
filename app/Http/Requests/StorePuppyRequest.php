<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePuppyRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'sex' => 'required|in:male,female',
            'identification_number' => 'nullable|string',
            'color' => 'required|string|max:255',
            'price' => 'required|numeric',
            'adoption_date' => 'required|date',
            'weight' => 'nullable|numeric',
            'litter_id' => 'required|exists:litters,id',
            'status' => 'required|in:disponible,réservé,vendu',
            'description' => 'nullable|string',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pictures' => 'nullable|array',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
