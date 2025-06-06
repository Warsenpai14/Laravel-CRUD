<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow access to this request.
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'author' => 'required|string|max:100',
            'category' => 'required|string|max:100',
        ];
    }
}

