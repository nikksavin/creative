<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' =>  'required|string|unique:posts,title',
            'content' =>  'nullable|string',
            'published_at' =>  'nullable|date_format:Y-m-d',
            'views' =>  'nullable|integer',
            'is_active' =>  'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>  'Title is required',
            'title.unique' =>  'Title must be unique',
        ];
    }
}
