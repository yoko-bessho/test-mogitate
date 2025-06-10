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
        $rules = [
            'name' => [
                'required',
                'string',
            ],
            'price' => [
                'required',
                'integer',
                'between:0,10000',
            ],
            'description' => [
                'required',
                'string',
                'max:120',
            ],
            'season_id' => [
                'required',
                'array',
            ],
            'season_id.*' => [
                'exists:seasons,id',
            ],
        ];
    
        if ($this->isMethod('post')) {
            // 新規作成時は画像必須
            $rules['image'] = [
                'required',
                'image',
                'mimes:jpeg,png',
            ];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // 更新時は画像はなくてもOK（nullable）
            $rules['image'] = [
                'nullable',
                'image',
                'mimes:jpeg,png',
            ];
        }
    
        return $rules;
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
