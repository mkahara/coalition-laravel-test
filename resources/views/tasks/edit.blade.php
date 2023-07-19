@extends('layouts.app')

@section('content')
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="container">
            <h1>Edit Task</h1>

            <form action="{{ route('task.update', $task) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Task Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <input type="text" name="project_id" id="project_id" class="form-control" value="{{ $task->project_id }}" required>
                    @error('project_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
