<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\ResponseBuilder;

class ChangePasswordRequest extends FormRequest
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
      'new_password' => 'required|confirmed',
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    $response = ResponseBuilder::send(false, $validator->errors(), '');
    throw new ValidationException($validator, $response);
  }
}
