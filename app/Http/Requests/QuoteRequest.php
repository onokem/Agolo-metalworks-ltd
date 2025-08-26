<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'project_type' => 'required|string|in:structural,architectural,custom',
            'project_description' => 'required|string|max:1000',
            'timeline' => 'required|string|in:immediate,1-3months,3-6months,6+months',
            'budget' => 'required|string|in:under50k,50k-100k,100k-250k,250k+',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please provide your name',
            'email.required' => 'Please provide your email address',
            'email.email' => 'Please provide a valid email address',
            'phone.required' => 'Please provide your phone number',
            'project_type.required' => 'Please select a project type',
            'project_description.required' => 'Please describe your project',
            'timeline.required' => 'Please select your project timeline',
            'budget.required' => 'Please select your budget range',
        ];
    }
}
