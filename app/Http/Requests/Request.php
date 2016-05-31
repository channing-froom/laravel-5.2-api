<?php

namespace App\Http\Requests;

use App\ApplicationTraits\ApiTraits;
use App\Exceptions\ApiRequestException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Log;

abstract class Request extends FormRequest
{

    protected function failedValidation(Validator $validator)
    {
        if (starts_with($this->getRequestUri(), '/api/')) {
            Log::error('Validation error: ' . print_r($validator->errors()->all(), true));

            $apiRequestException = new ApiRequestException('CHECK INPUT');
            $apiRequestException->setValidationErrors($validator->errors());

            dd($apiRequestException);

            throw $apiRequestException;
        }

        parent::failedValidation($validator);
    }
}
