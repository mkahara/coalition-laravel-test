<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projectId = $request->input('project_id');

        $tasksQuery = Task::query()->whereHas('project', function ($query) {
            $query->where('is_deleted', '0');
        })->where('is_deleted', '0');

        if ($projectId) {
            $tasksQuery->where('project_id', $projectId);
        }

        $tasks = $tasksQuery->orderBy('priority')->get();
        $projects = Project::where('is_deleted', '0')->orderBy('id')->get();

        return view('tasks.index', compact('tasks', 'projects', 'projectId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::where('is_deleted', '0')
            ->orderBy('id')->get();

        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'project_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('task.create')->withErrors($validator)->withInput();
        }

        $task = new Task();
        $task->name = $request->input('name');
        $task->priority = Task::count() + 1; // Set priority to the number of existing tasks + 1
        $task->project_id = $request->input('project_id');
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  mixed  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $projects = Project::orderBy('id')->get();

        return view('tasks.edit', compact('task', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $originalAttributes = $task->getOriginal();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'project_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the task.']);
        }

        $task->name = $request->input('name');
        $task->project_id = $request->input('project_id');
        $task->save();

        $updatedAttributes = $task->getAttributes();

        if ($originalAttributes != $updatedAttributes) {
            // Row has been updated
            return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
        } else {
            // No changes made to the row
            return redirect()->back()->with('info', 'No changes made to the task.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $updatedRows = Task::where('id', $id)->update(['is_deleted' => 1]);
        if ($updatedRows > 0) {
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        } else {
            return redirect()->route('tasks.index')->withErrors('error', 'Error while deleting task!');
        }
    }

    public function updatePriority(Request $request)
    {
        $taskData = $request->validate([
            'taskId' => 'required|integer',
            'priority' => 'required|integer'
        ]);

        $task = Task::findOrFail($taskData['taskId']);
        $task->priority = $taskData['priority'];
        $task->save();

        return response()->json(['message' => 'Task priority updated successfully']);
    }
}
