<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'images'=>['required','array'],
            'images.*'=>['mimes:jpg,jpeg,png','max:5000']
        ];
    }
}
