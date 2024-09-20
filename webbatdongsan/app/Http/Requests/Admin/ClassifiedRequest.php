<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassifiedRequest extends FormRequest
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
            'classified_title'=>['required','between:1,255',
                Rule::unique('classified','classified_title')->ignore($this->route('id'))],
            'group_id'=>['required','integer'],
            'project_id'=>['nullable','integer'],
            'classified_content'=>['required','between:3,60000'],
            'classified_price'=>['nullable','integer'],
            'price_type'=>['required','integer'],
            'classified_area'=>['nullable','integer'],
            'area_type'=>['required','integer'],
            'classified_image'=>['nullable'],
            'classified_address'=>['required'],
            'province_id'=>['required'],
            'num_bed'=>['required','integer'],
            'num_toi'=>['required','integer'],
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
