<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineSalesEntryRequest extends FormRequest
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
            "date" => "required|before_or_equal:today",
            "bill_no" => "required|numeric|max_digits:10",
            "party_id" => "required",
            "mc_no" => "required",
            "person_no" => "required",
            "install_date" => "required|before:today",
            "service_expiry_date" => "required",
            "order_no" => "required",
            "free_service" => "required|numeric|min:0|max:9",
            "service_type_id" => "required",
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'map_url' => "active_url",
            "mic_fitting_engineer_id" => "required",
            "delivery_engineer_id" => "required",
        ];
    }
}
