@extends('layouts.app')

@section('content')
    <div class="mt-8 overflow-hidden max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="uppercase text-2xl font-bold text-primary">Create Task</h1>
        </div>

        <div class="container bg-white shadow rounded p-5 py-10 sm:py-20">
            <form action="{{ route('task.store') }}" method="POST" class="flex justify-between flex-wrap">
                @csrf
                <div class="mb-4 flex flex-col flex-1">
                    <label for="name" class="mr-2">Task Name</label>
                    <textarea name="name" id="name" rows="3" class="bg-gray-100 px-2 rounded border" required></textarea>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col flex-1 flex-wrap ml-0 sm:ml-6">
                    <label for="project_id">Project Name</label>
                    <select name="project_id" id="project_id" class="bg-gray-100 px-2 rounded border mb-6 w-72 sm:w-auto" required>
                        <option value="">Select a project</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @error('project_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="flex justify-end">
                        <button type="submit" class="bg-primary rounded text-white px-2 ">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
