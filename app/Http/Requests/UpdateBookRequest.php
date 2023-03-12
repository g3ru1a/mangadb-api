<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'name' => 'string',
            'summary' => 'string',
            'isbn_10' => 'string|min:10|max:10',
            'isbn_13' => 'string|min:13|max:13',
            'page_count' => 'numeric',
            'release_date' => 'string',
            'series_type_id' => 'numeric|exists:series_types,id',
            'publisher_id' => 'numeric|exists:publishers,id',
            'language_id' => 'numeric|exists:languages,id',
            'binding_id' => 'numeric|exists:bindings,id',
            'cover' => 'image',
        ];
    }
}
