<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\ResponseBuilder;

class SignupRequest extends FormRequest
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
      'signup_firstname' => 'required',
      'signup_lastname' => 'required',
      'signup_email' => 'required|email',
      'signup_password' => 'required'
    ];
  }
  /**
   * Get custom messages for validator errors.
   *
   * @return array
   */
  // public function messages()
  // {
  //   return = [
  //      'signup_firstname.required' => 'Firstname is required.',
  //      'signup_lastname.required' => 'Firstname is required.',
  //      'signup_email.required' => 'Email is required.',
  //      'signup_password.required' => 'Password is required.',
  //    ];
  // }

  protected function failedValidation(Validator $validator)
  {
    $response = ResponseBuilder::send(false, $validator->errors(), '');
    throw new ValidationException($validator, $response);
  }
}
