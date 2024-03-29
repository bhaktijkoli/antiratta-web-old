<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

use App\Rules\AlphaNumberSpace;

use App\ResponseBuilder;
use Auth;

class AddCourseRequest extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
  public function authorize()
  {
    return Auth::user()->isEditor();
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
  public function rules()
  {
    return [
      'course_name' => ['required', new AlphaNumberSpace],
      'course_shortname' => ['required', 'alpha_num'],
      'course_price' => ['required'],
      'course_university' => ['required'],
      'course_branch' => ['required'],
      'course_sem' => ['required'],
    ];
  }

  protected function failedValidation(Validator $validator)
  {
    $response = ResponseBuilder::send(false, $validator->errors(), '');
    throw new ValidationException($validator, $response);
  }
}
