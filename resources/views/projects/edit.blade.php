@extends('layouts.app')

@section('content')
    <div class="mt-8 dark:bg-gray-800 overflow-hidden max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="uppercase text-2xl font-bold text-primary">Edit Project</h1>
        </div>

        <div class="container bg-white shadow rounded p-5 py-20">
            <form action="{{ route('project.update', $project) }}" method="POST" class="flex justify-between">
                @csrf
                @method('PUT')
                <div class="w-3/4">
                    <label for="name" class="w-1/4">Project Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-100 px-2 rounded border w-3/4" value="{{ $project->name }}" required>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/4">
                    <button type="submit" class="bg-primary rounded text-white px-2">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
