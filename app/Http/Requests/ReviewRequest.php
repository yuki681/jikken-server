<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'menu_id' => 'required',
            'message' => 'required',
            'reputation' => 'required|integer|min:1|max:5',
            'author_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'レビューを入力してください。',
            'reputation.required' => '評価を選択してください。',
            'author_name.required' => '名前を入力してください。'
        ];
    }

    // public function reviewAttributes()
    // {
        
    // }
}
