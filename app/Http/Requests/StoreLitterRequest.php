<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLitterRequest extends FormRequest
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
            'mom_id' => 'required|exists:dogs,id',
            'dad_id' => 'required|exists:dogs,id',
            'birth_date' => 'required|date',
            'number_puppies' => 'required|integer',
            'breed_id' => 'required|exists:breeds,id',
            'status' => 'nullable|in:en cours,futur,passée',
        ];
    }
}
