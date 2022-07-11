<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:category,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|required|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Це поле не повинне бути пустим',
            'title.string' => 'Дані повинні відпорвідати строковому типу',
            'content.required' => 'Це поле не повинне бути пустим',
            'content.string' => 'Дані повинні відпорвідати строковому типу',
            'preview_image.required' => 'Це поле повинне бути пустим',
            'preview_image.file' => 'Необхідно вибрати файл',
            'main_image.required' => 'Це поле повинне бути пустим',
            'main_image.file' => 'Необхідно вибрати файл',
            'category_id.required' => 'Це поле повинне бути пустим',
            'category_id.integer' => 'ID категорії повенне бути числом',
            'category_id.exists' => 'ID категорії повинне бути в базі даних',
            'tag_ids.array' => 'Необхідно відправляти масив даних',
        ];
    }
}
