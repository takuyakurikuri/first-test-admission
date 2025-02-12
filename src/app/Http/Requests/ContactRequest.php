<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'category_id'=> ['required'],
            'first_name'=>['required','string','max:255'],
            'last_name'=>['required','string','max:255'],
            'gender'=> ['required'],
            'email'=> ['required','string','email','max:255'],
            'tel'=> ['required'],
            'tel.0'=> ['required','digits_between:2,5','numeric'],
            'tel.1'=> ['required','digits_between:2,4','numeric'],
            'tel.2'=> ['required','digits:4','numeric'],
            'address'=> ['required','string'],
            'detail'=> ['required','string','max:120'],
        ];
    }

    public function messages(){
        return [
            'category_id.required' => 'お問合せの種類を選択して下さい',
            'first_name.required' => '名を入力して下さい',
            'first_name.string' => '名を入力して下さい',
            'first_name.max' => '名を入力して下さい',
            'last_name.required' => '姓を入力して下さい',
            'last_name.string' => '姓を入力して下さい',
            'last_name.max' => '姓を入力して下さい',
            'gender.required' => '性別を選択して下さい',
            'email.required' => 'メールアドレスを入力して下さい',
            'email.string' => 'メールアドレスを入力して下さい',
            'email.email' => 'メールアドレスはメール形式で入力して下さい',
            'email.max' => 'メールアドレスを入力して下さい',
            'tel.required' => '電話番号を入力して下さい',
            'tel.*.required' => '電話番号を入力して下さい',
            'tel.*.digits_between' => '電話番号は5桁までの数字で入力して下さい',
            'tel.2.digits' => '電話番号は5桁までの数字で入力して下さい',
            'address.required' => '住所を入力して下さい',
            'address.string' => '住所を入力して下さい',
            'detail.required' => 'お問合せ内容を入力して下さい',
            'detail.string' => 'お問合せ内容を入力して下さい',
            'detail.max' => 'お問合せ内容は120文字以内で入力して下さい',
        ];
    }

}