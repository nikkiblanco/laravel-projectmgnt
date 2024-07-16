<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TaskController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->getCurrentUser();
        $tasks = Task::where('delete_flg', 0)->with(['project', 'user'])->paginate(5);

        return view('pages.task.index', ["info" => $data], compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        $data = $this->getCurrentUser();
        $projects = Project::all();
        $users = User::all();

        return view('pages.task.create', ["info" => $data], compact('projects', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project' => 'required|integer',
            'task_name' => 'required',
            'due_date' => 'required|date',
            'priority' => 'required|', Rule::in([0, 1, 2]),
            'user' => 'required|integer',
        ]);

        $task = Task::create([
            'project_id' => $request->project,
            'task_name' => $request->task_name,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'user_id' => $request->user
        ]);

        if ($task) {
            return redirect('/task')->with("success", "Task [" . $request->task_name . "] was successfully added.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $data = $this->getCurrentUser();
        $projects = Project::all();
        $users = User::all();

        return view("pages.task.show", ["info" => $data], compact('projects', 'users', 'task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $data = $this->getCurrentUser();
        $projects = Project::all();
        $users = User::all();

        return view("pages.task.edit", ["info" => $data], compact('projects', 'users', 'task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'project' => 'required|integer',
            'task_name' => 'required',
            'due_date' => 'required|date',
            'priority' => 'required|', Rule::in([0, 1, 2]),
            'user' => 'required|integer',
        ]);

        $task->update([
            'project_id' => $request->project,
            'task_name' => $request->task_name,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'user_id' => $request->user
        ]);
        
        if ($task) {
            return redirect('/task')->with("success", "Task [" . $request->task_name . "] was successfully updated.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $update = DB::table('tasks')->where('id', $task->id)->update(['delete_flg' => 1]);
        if ($update) {
            return redirect('/task')->with("success", "Task [" . $task->task_name . "] was successfully deleted.");
        }
    }
}
