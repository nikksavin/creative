<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

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
            'title' => 'required|string',
            'content' => 'required|string',
            'published_at' => 'nullable|date_format:Y-m-d H:i:s',
            'category_id' => 'nullable|integer|exists:categories,id',
            'image' => 'nullable|image',
        ];
    }

    protected function passedValidation()
    {
        return $this->merge([
            'img_path' => Storage::disk('public')->put('images', $this->image),
            'profile_id' => '1'
        ]);
    }
}
