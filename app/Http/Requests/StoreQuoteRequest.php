<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service' => ['required','string','max:120'],
            'timeline' => ['nullable','string','max:120'],
            'budget' => ['nullable','string','max:120'],
            'location' => ['required','string','max:255'],
            'access' => ['nullable','string','max:120'],
            'details' => ['required','string','max:4000'],
            'first_name' => ['required','string','max:120'],
            'last_name' => ['required','string','max:120'],
            'email' => ['required','email','max:255'],
            'phone' => ['nullable','string','max:60'],
            'subscribe' => ['nullable'],
        ];
    }
}
