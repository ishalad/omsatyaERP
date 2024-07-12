<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartyCreateRequest extends FormRequest
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
            "name" => "required|string",
            "address" => "required",
            "area_id" => "required",
            "phone_no" => "required|numeric|digits:10",
            "gst_no" => "alphanum|size:15",
            "pan_no" => "alphanum|size:10",
            "contact_person_id" => "required",
            "owner_id" => "required",
        ];
    }
}
