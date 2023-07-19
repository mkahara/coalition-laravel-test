<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('priority')->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
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
            'priority' => 'required',
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  mixed  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tasks',
            'project_id' => 'required|unique:tasks',
        ]);

        if ($validator->fails()) {
//            return redirect()->route('task.edit')->withErrors($validator)->withInput();
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the task.']);
        }

        $task->name = $request->input('name');
        $task->project_id = $request->input('project_id');
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
