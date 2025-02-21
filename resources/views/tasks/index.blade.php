@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Список задач</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Добавить задачу</a>

    <table class="table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Дата выполнения</th>
                <th>Категория</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
    <tr>
        <td>{{ $task->title }}</td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : 'Нет даты' }}</td>
        <td>{{ $task->category ? $task->category->name : 'Нет категории' }}</td>
        <td>
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Редактировать</a>
            <!-- Можно добавить кнопку для удаления задачи, если нужно -->
        </td>
    </tr>
@endforeach

        </tbody>
    </table>
</div>
@endsection
