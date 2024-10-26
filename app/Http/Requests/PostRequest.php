<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
//$ php artisan make:request PostRequest で作成

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post.title' => 'required|string|max:100',
            'post.body' => 'required|string|max:4000',
            //ルールが複数ある場合は|（パイプ）で繋げて記載します。
            
        ];
    }
}
