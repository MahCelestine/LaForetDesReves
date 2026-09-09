<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'extract' => 'required|string|max:255',
            'content' => 'nullable|string',
            'tiktok_path' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'publication_date' => 'required|date',
            'is_published' => 'required|boolean',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
