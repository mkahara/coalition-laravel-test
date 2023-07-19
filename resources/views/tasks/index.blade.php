@extends('layouts.app')

@section('content')
        <div class="mt-8 dark:bg-gray-800 overflow-hidden max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="uppercase text-2xl font-bold text-primary">Tasks List</h1>
                <div class="">
                    <label for="project">Filter by Project</label>
                    <select name="project"  id="project" class="text-sm font-normal border rounded px-2" onchange="handleProjectSelection(this)">
                        <option value="">All Projects</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" {{ $project->id == $projectId ? 'selected' : '' }}>{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('task.create') }}" class="bg-primary rounded text-white font-bold px-2 py-1 hover:bg-secondary">Add Task</a>
            </div>

            <div class="container bg-white shadow rounded p-5">
                <div class="headings flex bg-gray-100 py-2 font-bold text-primary">
                    <span class="drag-handle-title invisible mr-4 w-200">&#x2630;</span>
                    <span class="task-name flex-1">Task Name</span>
                    <span class="project-name flex-1">Project Name</span>
                    <span class="task-actions flex-1 text-right invisible">Actions</span>
                </div>
                <ul class="list-group">
                    @foreach ($tasks as $task)
                        <li class="list-group-item flex justify-between py-3 px-2" data-task-id="{{ $task->id }}">
                            <span class="drag-handle mr-4 w-200">&#x2630;</span>
                            <span class="task-name flex-1">{{ $task->name }}</span>
                            <span class="project-name flex-1">{{ $task->project->name }}</span>
                            <div class="float-right flex flex-1 justify-end">
                                <a href="{{ route('task.edit', $task) }}" class="btn mr-4 bg-secondary px-3 rounded text-black transform hover:scale-105 transition-all duration-300 ease-in-out">Edit</a>
                                <form action="{{ route('task.destroy', $task) }}" method="POST" class="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-red-400 px-3 rounded text-white hover:scale-105 transition-all duration-300 ease-in-out" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
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
