@extends('layouts.app')

@section('content')
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="container">
            <h1>Create Manager</h1>

            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Task Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                    <label for="project_id">Task Name</label>
                    <input type="text" name="project_id" id="project_id" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
