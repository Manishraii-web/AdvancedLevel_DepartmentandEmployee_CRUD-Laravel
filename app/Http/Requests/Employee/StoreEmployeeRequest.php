<?php

namespace App\Http\Requests\Employee;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           "firstname" => "required|string|max:255",
           "lastname" => "required|string|max:255",
            'email' =>  ['required', 'email','unique:employees,email'],
            'phone' => "required|string|max:20",
            'salary' => "required|numeric|min:0",
            'department_id'=> "required|exists:departments,id",
            'image' => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ];
    }
}
