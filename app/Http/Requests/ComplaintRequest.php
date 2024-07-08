<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintRequest extends FormRequest
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
            "date" => "required|date",
            "time" => "required",
            "sales_entry_id" => "required",
            "party_id" => "required",
            // "product_id" => "required",
            "complaint_type_id" => "required",
            "status_id" => "required",
            // "engineer_id" => "required",
            // "engineer_in_time" => "required|date_format:H:i",
            // "engineer_in_date" => "required",
            // "engineer_out_date" => "required",
            // "engineer_out_time" => "required|date_format:H:i",
        ];
    }
}
