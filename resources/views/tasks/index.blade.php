@extends('layouts.app')

@section('content')
        <div class="mt-8 overflow-hidden max-w-5xl mx-auto">
            <div class="flex flex-wrap justify-between items-center mb-6">
                <h1 class="text-center sm:text-left uppercase text-2xl font-bold text-primary w-full sm:w-auto mb-3 sm:mb-0">Tasks List</h1>
                <div class="">
                    <label for="project">Filter by</label>
                    <select name="project"  id="project" class="text-sm font-normal border rounded px-2 py-1.5 w-48" onchange="handleProjectSelection(this)">
                        <option value="">All Projects</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" {{ $project->id == $projectId ? 'selected' : '' }}>{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('task.create') }}" class="bg-primary rounded text-white font-bold px-2 py-1 hover:bg-secondary">Add Task</a>
            </div>

            <div class="container bg-white shadow rounded p-5">
                <div class="headings sm:flex bg-gray-100 py-2 font-bold text-primary text-sm sm:text-base">
                    <span class="drag-handle-title invisible mr-4 w-200">&#x2630;</span>
                    <span class="task-name flex-1">Task Name</span>
                    <span class="project-name flex-1 ml-6 sm:ml-0">Project Name</span>
                    <span class="task-actions flex-1 text-right invisible">Actions</span>
                </div>
                <ul class="list-group">
                    @foreach ($tasks as $task)
                        <li class="list-group-item flex items-center py-3 px-2" data-task-id="{{ $task->id }}">
                            <span class="drag-handle mr-4 w-200">&#x2630;</span>
                            <span class="task-name flex-1 text-sm sm:text-base pr-4">{{ $task->name }}</span>
                            <span class="project-name flex-1 text-sm sm:text-base">{{ $task->project->name }}</span>
                            <div class="float-right flex flex-1 justify-end items-center flex-wrap">
                                <a href="{{ route('task.edit', $task) }}" class="btn bg-secondary px-3 rounded text-black transform hover:scale-105 transition-all duration-300 ease-in-out w-16 mr-0 sm:mr-4 mb-2 sm:mb-0 text-center text-sm sm:text-base">Edit</a>
                                <form action="{{ route('task.destroy', $task) }}" method="POST" class="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-red-400 px-3 rounded text-white hover:scale-105 transition-all duration-300 ease-in-out w-16 text-center text-sm sm:text-base" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection

@section('customjs')
    <script type="application/javascript">
        /*
        Filter tasks based on the selected project, if 'All projects' is selected then display all tasks
         */
        function handleProjectSelection(selectElement) {
            const selectedValue = selectElement.options[selectElement.selectedIndex].value;
            if (selectedValue === '') {
                window.location.href = '/';
            } else {
                window.location.href = `{{ route('tasks.index') }}?project_id=${selectedValue}`;
            }
        }
    </script>
@endsection
