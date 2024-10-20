<?php

namespace App\Http\Request;



use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateUserRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected $userRegistration;
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request): array
    {
        return [
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:500',
            'street' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
        ];
    }
}
