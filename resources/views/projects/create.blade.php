@extends('layouts.app')

@section('content')
    <div class="mt-8 dark:bg-gray-800 overflow-hidden max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="uppercase text-2xl font-bold text-primary">Create Project</h1>
        </div>

        <div class="container bg-white shadow rounded p-5 py-10 sm:py-20">
            <form action="{{ route('project.store') }}" method="POST" class="flex justify-between flex-wrap">
                @csrf
                <div class="mb-4">
                    <label for="name" class="mr-2">Project Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-100 px-2 rounded border" value="" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-primary rounded text-white px-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
