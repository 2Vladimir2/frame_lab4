<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Http\Requests\CreateTaskRequest;

class TaskController extends Controller
{

    public function index()
{
    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));
}

    // Отобразить форму создания задачи
    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    // Сохранить новую задачу
    public function store(CreateTaskRequest $request)
    {
        // Создаем задачу с валидированными данными
        Task::create($request->validated());

        // Перенаправляем с флеш-сообщением
        return redirect()->route('tasks.create')->with('success', 'Задача успешно добавлена!');
    }

    public function edit(Task $task)
{

    $categories = Category::all();
    return view('tasks.edit', compact('task', 'categories'));
}

public function update(UpdateTaskRequest $request, Task $task)
{
    $task->update($request->validated());

    return redirect()->route('tasks.index')->with('success', 'Задача успешно обновлена!');
}


}
