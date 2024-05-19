<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:55',
            'email' => 'required|email|min:3|max:55',
            'phone' => 'required|digits:10',
            'message' => 'required|min:3',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name',
            'name.string' => 'Name must be a string',
            'name.min' => 'Name must be at least :min characters',
            'name.max' => 'Name must not exceed :max characters',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'email.min' => 'Email must be at least :min characters',
            'email.max' => 'Email must not exceed :max characters',
            'phone.required' => 'Please enter your 10-digit phone number',
            'phone.digits' => 'Phone number must be exactly :digits digits',
            'message.required' => 'Please enter your message',
            'message.min' => 'Your message must be at least :min characters',
        ];
    }
}
