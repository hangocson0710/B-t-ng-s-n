<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatedClassifiedRequest extends FormRequest
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
            'classified_title'=>['required','between:1,255','unique:classified,classified_title'],
            'group_id'=>['required','integer'],
            'project_id'=>['integer','nullable'],
            'classified_address'=>['required'],
            'province_id'=>['required'],
            'district_id'=>['required'],
            'ward_id'=>['required'],
            'classified_content'=>['required','between:1,60000'],
            'price_type'=>['required','integer'],
            'classified_area'=>['nullable','integer'],
            'classified_price'=>['nullable','integer'],
            'area_type'=>['required','integer'],
            'num_bed'=>['required','integer'],
            'num_toi'=>['required','integer'],
            'classified_image'=>['required', 'array', 'min:1'],
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
