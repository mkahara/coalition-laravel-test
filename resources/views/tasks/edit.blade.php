@extends('layouts.app')

@section('content')
    <div class="mt-8 dark:bg-gray-800 overflow-hidden max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="uppercase text-2xl font-bold text-primary">Edit Task</h1>
        </div>

        <div class="container bg-white shadow rounded p-5 py-10 sm:py-20">
            <form action="{{ route('task.update', $task) }}" method="POST" class="flex justify-between flex-wrap">
                @csrf
                @method('PUT')
                <div class="mb-4 flex">
                    <label for="name" class="mr-2">Task Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-100 px-2 rounded border" value="{{ $task->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="project_id">Project Name</label>
                    <select name="project_id" id="project_id" class="bg-gray-100 px-2 rounded border" required>
                        <option value="">Select a project</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @error('project_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-primary rounded text-white px-2">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
