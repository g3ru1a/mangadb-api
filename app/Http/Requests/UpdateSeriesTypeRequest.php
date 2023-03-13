<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeriesTypeRequest extends FormRequest
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
            'series_id' => 'numeric|exists:series,id',
            'item_type_id' => 'numeric|exists:item_types,id',
            'status_id' => 'numeric|exists:statuses,id',
            'staff' => 'array|min:1',
            'staff.*' => 'numeric|exists:staff,id',
            'roles' => 'required_with:staff|array|min:1',
            'roles.*' => 'string',
        ];
    }
}
