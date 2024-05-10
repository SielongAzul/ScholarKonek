<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Scholarship;

class ScholarshipRequest extends FormRequest
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
            
            
                'title' => 'required|string|max:225',
                'description' => 'required|string|max:225',
                'schoolname' => 'required|string|max:225',
                'requirements' => 'required|string|max:225',
                'location' => 'required|string|max:225',
                'contactno' => 'required|string|max:225',
                'category' => 'required|in:' . implode(',', Scholarship::$category),
                'grants' => 'required|in:' . implode(',', Scholarship::$grants),
                'grade_needed' => 'required|numeric|max:100',
                'monetary_value' => 'required|numeric|min:1000',
    
            
        ];
    }
}
