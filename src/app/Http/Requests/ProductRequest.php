<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        $this->merge([
            'price' => mb_convert_kana($this->price, 'n'), // 全角数字→半角に変換
        ]);
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                ],
            'price' => [
                'required',
                'integer',
                'between:0,10000',
                ],
            'image' => [
                'required',
                'image',
                'mimes:jpeg,png',
                ],
            'description' => [
                'required',
                'string',
                'max:120',
                ],
            'seasons' => [
                'array',
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'name.string' => '商品名を文字列で入力してください',
            'price.required' => '値段を入力してください',
            'price.integer' => '数値で入力してください',
            'price.between' => '0~10000円以内で入力してください',
            'image.required' => '商品画像を登録してください',
            'image.image' => '画像ファイルは「.png」または「.jpeg」形式でアップロードしてください',
            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
            'description.required' => '商品説明を入力してください',
            'description.string' => '文字列で入力してください',
            'description.max' => '120字以内で入力してください',
            'seasons.required' => '季節を選択してください',
    
        ];
    }

}
