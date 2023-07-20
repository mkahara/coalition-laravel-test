@extends('layouts.app')

@section('content')
    <div class="mt-8 overflow-hidden max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="uppercase text-2xl font-bold text-primary">Edit Task</h1>
        </div>

        <div class="container bg-white shadow rounded p-5 py-10">
            <form action="{{ route('task.update', $task) }}" method="POST" class="flex justify-between flex-wrap flex-col">
                @csrf
                @method('PUT')
                <div class="mb-4 flex flex-col">
                    <label for="name" class="">Task Name</label>
                    <textarea name="name" id="name" rows="3" class="bg-gray-100 px-2 rounded border" required>{{ $task->name }}</textarea>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 flex flex-col">
                    <label for="project_id">Project Name</label>
                    <select name="project_id" id="project_id" class="bg-gray-100 px-2 rounded border w-72 sm:w-auto" required>
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
