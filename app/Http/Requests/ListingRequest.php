<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'beds'=>['required','int','min:0'],
            'baths'=>['required','int','min:0'],
            'area'=>['required','int','min:0'],
            'city'=>['required','string'],
            'code'=>['required','string'],
            'street'=>['required','string'],
            'street_nr'=>['required','int','min:1'],
            'price'=>['required','int','min:1']
        ];
    }
}
