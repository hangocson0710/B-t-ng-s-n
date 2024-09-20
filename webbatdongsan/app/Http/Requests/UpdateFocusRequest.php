<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFocusRequest extends FormRequest
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
            // 'project_name'=>['required','between:1,255',
            //     Rule::unique('project','project_name')->ignore($this->route('id'))],
            'news_title'=>['required','between:3,100',
                Rule::unique('news','news_title')->ignore($this->route('id'))
                ],
            'group_id'=>['required','integer'],
            'news_image'=>['image'],
            'news_content'=>['required','between:1,60000'],
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
