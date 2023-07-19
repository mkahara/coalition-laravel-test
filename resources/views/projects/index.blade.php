@extends('layouts.app')

@section('content')
    <div class="mt-8 dark:bg-gray-800 overflow-hidden max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-left uppercase text-2xl font-bold text-primary sm:w-auto">Projects List</h1>

            <a href="{{ route('project.create') }}" class="bg-primary rounded text-white font-bold px-2 py-1 hover:bg-secondary">Add Project</a>
        </div>

        <div class="container bg-white shadow rounded p-5">
            <div class="headings flex bg-gray-100 py-2 font-bold text-primary">
                <span class="drag-handle-title invisible mr-4 w-200">&#x2630;</span>
                <span class="project-name flex-1">Project Name</span>
                <span class="task-actions flex-1 text-right invisible">Actions</span>
            </div>
            <ul class="list-group">
                @php $count = 1 @endphp
                @foreach ($projects as $project)
                    <li class="list-group-item flex items-center py-3 px-2" data-project-id="{{ $project->id }}">
                        <span class="drag-handle mr-4 w-200 text-sm sm:text-base">{{ $count }}</span>
                        <span class="project-name flex-1 flex-1 text-sm sm:text-base">{{ $project->name }}</span>
                        <div class="float-right flex flex-1 justify-end sm:justify-center items-center flex-wrap flex-col sm:flex-row">
                            <a href="{{ route('project.edit', $project) }}" class="btn bg-secondary px-3 rounded text-black transform hover:scale-105 transition-all duration-300 ease-in-out w-16 mr-0 sm:mr-4 mb-2 sm:mb-0 text-center text-sm sm:text-base">Edit</a>
                            <form action="{{ route('project.destroy', $project) }}" method="POST" class="">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-red-400 px-3 rounded text-white hover:scale-105 transition-all duration-300 ease-in-out w-16 text-center text-sm sm:text-base" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                            </form>
                        </div>
                    </li>
                    @php $count++ @endphp
                @endforeach
            </ul>
        </div>
    </div>
@endsection
