<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProjectController extends DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('delete_flg', 0)->withCount('tasks')->paginate(5);

        $data = $this->getCurrentUser();
        return view(
            'pages.project.index',
            ["info" => $data],
            compact('projects')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->getCurrentUser();
        return view("pages.project.create", ["info" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'due_date' => 'required|date',
            'status' => 'required|', Rule::in([0, 1, 2])
        ]);

        $project = new Project();
        $project->project_name = $request->project_name;
        $project->description = $request->description;
        $project->due_date = $request->due_date;
        $project->status = $request->status;
        $project->save();

        if ($project) {
            return redirect('/project')->with("success", "Project [" . $request->project_name . "] was successfully added.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $data = $this->getCurrentUser();
        return view("pages.project.show", ["info" => $data], compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $data = $this->getCurrentUser();
        return view(
            "pages.project.edit",
            ["info" => $data],
            compact('project')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'due_date' => 'required|date',
            'status' => 'required|', Rule::in([0, 1, 2])
        ]);

        $project->update($request->all());

        if ($project) {
            return redirect('/project')->with("success", "Project [" . $request->project_name . "] was successfully updated.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $update = DB::table('projects')->where('id', $project->id)->update(['delete_flg' => 1]);
        if ($update) {
            return redirect('/project')->with("success", "Project [" . $project->project_name . "] was successfully deleted.");
        }
    }
}
