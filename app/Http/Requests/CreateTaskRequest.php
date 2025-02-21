<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Разрешить запрос
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:3',
            'description' => 'nullable|string|max:500',
            'due_date' => 'required|date|after_or_equal:today',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле Название обязательно для заполнения.',
            'title.min' => 'Поле Название должно содержать минимум 3 символа.',
            'description.max' => 'Поле Описание не может превышать 500 символов.',
            'due_date.required' => 'Поле Дата выполнения обязательно для заполнения.',
            'due_date.after_or_equal' => 'Дата выполнения должна быть не меньше сегодняшней даты.',
            'category_id.required' => 'Поле Категория обязательно для заполнения.',
            'category_id.exists' => 'Выбранная категория не существует.',
        ];
    }
}
