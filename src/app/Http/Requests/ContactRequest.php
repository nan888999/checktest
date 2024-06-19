<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel-1' => ['required', 'numeric', 'digits_between:1,5'],
            'tel-2' => ['required', 'numeric', 'digits_between:1,5'],
            'tel-3' => ['required', 'numeric', 'digits_between:1,5'],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required','exists:categories,id'],
            'detail' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel-1.required' => '電話番号を入力してください',
            'tel-1.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel-2.required' => '電話番号を入力してください',
            'tel-2.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel-3.required' => '電話番号を入力してください',
            'tel-3.digits_between' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'building.max' => '建物名は255文字以内で入力してください',
            'category_id.required' => '問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120字以内で入力してください',
            ];
    }
}
