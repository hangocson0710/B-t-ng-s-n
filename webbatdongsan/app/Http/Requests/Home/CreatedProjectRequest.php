<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class CreatedProjectRequest extends FormRequest
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
            'project_name'=>['required','between:1,255','unique:project,project_name'],
            'group_id'=>['required','integer'],
            'project_address'=>['required'],
            'province_id'=>['required'],
            'district_id'=>['required'],
            'ward_id'=>['required'],
            'project_content'=>['required','between:1,60000'],
            'price_type'=>['required','integer'],
            'project_area'=>['nullable','integer'],
            'project_price'=>['nullable','integer'],
            'area_type'=>['required','integer'],
            'project_image'=>['required', 'array', 'min:1'],
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
