<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $total_projects = Project::where('delete_flg', 0)->count();
        $total_tasks = Task::where('delete_flg', 0)->count();
        $total_users = User::all()->count();

        $my_tasks = Task::where('delete_flg', 0)
            ->where('user_id', Auth::user()->id)
            ->with(['project', 'user'])
            ->paginate(5);

        $data = $this->getCurrentUser();
        return view("pages.dashboard", ["info" => $data], compact(['total_projects', 'total_tasks', 'total_users', 'my_tasks']));
    }

    public function logoutUser()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function getCurrentUser()
    {
        $data = [];
        if (Auth::check()) {
            $data = [
                "userId" => Auth::user()->id,
                "name" => Auth::user()->name,
            ];
        }

        return $data;
    }
}
