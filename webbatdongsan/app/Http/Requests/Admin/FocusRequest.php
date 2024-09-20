<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FocusRequest extends FormRequest
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
            'news_title'=>['required','between:3,100','unique:news,news_title'],
            'group_id'=>['required','integer'],
            'news_image'=>['required','image'],
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

