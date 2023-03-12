<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'name' => 'required|string',
            'summary' => 'required|string',
            'isbn_10' => 'required|string|min:10|max:10',
            'isbn_13' => 'required|string|min:13|max:13',
            'page_count' => 'required|numeric',
            'release_date' => 'required|string',
            'series_type_id' => 'required|numeric|exists:series_types,id',
            'publisher_id' => 'required|numeric|exists:publishers,id',
            'language_id' => 'required|numeric|exists:languages,id',
            'binding_id' => 'required|numeric|exists:bindings,id',
            'cover' => 'required|image',
        ];
    }
}
