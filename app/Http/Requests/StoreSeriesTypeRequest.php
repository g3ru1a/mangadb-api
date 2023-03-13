<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeriesTypeRequest extends FormRequest
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
            'series_id' => 'required|numeric|exists:series,id',
            'item_type_id' => 'required|numeric|exists:item_types,id',
            'status_id' => 'required|numeric|exists:statuses,id',
            'staff' => 'required|array|min:1',
            'staff.*' => 'required|numeric|exists:staff,id',
            'roles' => 'required|array|min:1',
            'roles.*' => 'required|string',
        ];
    }
}
