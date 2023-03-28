<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class ItemRequest extends FormRequest
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
            'name' => 'required',
            'price' => ['required', 'integer'],
            'description' => 'required',
            'img_url' => 'required',
            'categories' => 'required',
            'condition_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '販売価格を入力してください',
            'price.integer' => '数値を入力してください',
            'description.required' => '商品説明を入力してください',
            'img_url.required' => '商品画像を選択してください',
            'categories.required' => 'カテゴリーを選択してください',
            'condition_id.required' => '商品状態を選択してください',
        ];
    }
}
