<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class todoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == 'hello'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'genre' => 'numeric|between:1,3',
        ];
    }

    public function messages(){
        return [
            'genre.required' => 'カテゴリを選択してください。'
        ];
    }
}
