@extends('layouts.app')

@section('content')
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="container">
                <h1>Task Manager</h1>

                <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">Create Task</a>

                <ul class="list-group">
                    @foreach ($tasks as $task)
                        <li class="list-group-item" data-task-id="{{ $task->id }}">
                            <span class="drag-handle">&#x2630;</span>
                            {{ $task->name }}
                            <div class="float-right">
                                <a href="{{ route('task.edit', $task) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('task.destroy', $task) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection
