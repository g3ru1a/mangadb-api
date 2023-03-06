<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'cover' => 'required|image',
            'names' => 'required|array|min:1',
            'names.*' => 'required|string',
            'name_languages' => 'required|array|min:1',
            'name_languages.*' => 'required|numeric'
        ];
    }
}
