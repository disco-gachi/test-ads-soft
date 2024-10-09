<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'data' => 'required|array',
            'data.*' => 'required|array|size:2',
            'data.*.*' => 'required|string|min:1',
        ];
    }
}
