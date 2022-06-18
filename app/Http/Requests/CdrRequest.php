<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CdrRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'rate' => 'required|array',
            'rate.energy' => 'required|numeric|min:0',
            'rate.time' => 'required|numeric|min:0',
            'rate.transaction' => 'required|numeric|min:0',
            'cdr' => 'required|array',
            'cdr.meterStart' => 'required|int|min:0',
            'cdr.timestampStart' => 'required|date',
            'cdr.meterStop' => 'required|int|min:0|numeric',
            'cdr.timestampStop' => 'required|date',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(Response::failed($validator->errors() , Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}