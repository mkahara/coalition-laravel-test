@extends('layouts.app')

@section('content')
    <div class="mt-8 overflow-hidden max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="uppercase text-2xl font-bold text-primary">Edit Project</h1>
        </div>

        <div class="container bg-white shadow rounded p-5 py-10">
            <form action="{{ route('project.update', $project) }}" method="POST" class="flex justify-between flex-wrap flex-col">
                @csrf
                @method('PUT')
                <div class="mb-4 flex flex-1 flex-col">
                    <label for="name" class="mr-2">Project Name</label>
                    <textarea name="name" id="name" rows="3" class="bg-gray-100 px-2 rounded border" required>{{ $project->name }}</textarea>
                    @error('name')
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
