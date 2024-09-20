<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
      $validate = [
            'project_name'=>['required','between:1,255',
                Rule::unique('project','project_name')->ignore($this->route('id'))],
            'group_id'=>['required','integer'],
            'project_content'=>['required','between:3,60000'],
            'project_price'=>['nullable','integer'],
            'price_type'=>['required','integer'],
            'project_area'=>['nullable','integer'],
            'area_type'=>['required','integer'],
            'project_image'=>['nullable'],
            'project_address'=>['required'],
            'province_id'=>['required'],
            'district_id'=>['required'],
            'ward_id'=>['required'],
      ];
        return $validate;

    }
    public function messages()
    {
        return config('constants.validate_message');
    }
    public function attributes()
    {
        return config('constants.validate_attribute_alias');
    }
}
