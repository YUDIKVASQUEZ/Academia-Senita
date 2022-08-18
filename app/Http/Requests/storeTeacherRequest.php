<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeTeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:45',
            'lastname'=>'required|max:45',
            'university_degree'=>'required|max:50',
            'age'=>'required|size:2',
            'contract_date'=>'required:nullable|date',
            'photo'=> 'required|image|max:5120',
            'identify_document'=>'required|mimes:pdf',

        ];
    }
}
