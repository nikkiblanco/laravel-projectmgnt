@extends('layouts.app')

@include('layouts.navbar')
@section('content')
    <div class="mt-5 mb-2">
        <h5>Dashboard</h5>
        <hr>
        <div class="row">
            <div class="col-lg-4">
                <div class="card bg-warning">
                    <div class="card-header">
                        Total tasks
                    </div>
                    <div class="card-body text-center">
                        {{ $total_tasks }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-success">
                    <div class="card-header">
                        Total Tasks
                    </div>
                    <div class="card-body text-center">
                        {{ $total_tasks }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-info">
                    <div class="card-header">
                        Total Users
                    </div>
                    <div class="card-body text-center">
                        {{ $total_users }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <h5>My Tasks</h5>
        <table class="table table-striped mt-2">
            <thead>
                <th>Project Name</th>
                <th>Tasks Name</th>
                <th>Due Date</th>
                <th>Priority</th>
            </thead>
            <tbody>
                @if (count($my_tasks))
                @foreach ($my_tasks as $task)
                    <tr>
                        <td>{{ $task->project->project_name }}</td>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->due_date->format('m/d/Y') }}</td>
                        <td>
                            <span
                            class="badge rounded-pill text-bg-{{ $task->priority_text == 'Low' ? 'secondary' : ($task->priority_text == 'Medium' ? 'warning' : 'danger') }}">
                            {{ $task->priority_text }}
                        </span>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="text-center">
                    <td colspan="6">
                        No record(s) found.
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
