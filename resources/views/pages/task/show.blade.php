@extends('layouts.app')
@include('layouts.navbar')
@section('content')
    <div class="mt-5">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col mt-2">
                        <h5>View Task</h5>
                    </div>
                    <div class="col">
                        <a href="{{ url('/task') }}" class="btn btn-outline-secondary float-end">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="project">Project Name</label>
                            <select class="form-select" readonly disabled>
                                <option value="" selected>{{ $task->project->project_name }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="task_name">Task Name</label>
                            <input type="text" id="task_name" name="task_name" class="form form-control" value="{{ $task->task_name }}" readonly disabled />
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form form-control" rows="3" readonly disabled>{{ $task->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="due_date">Due Date</label>
                            <input type="date" id="due_date" name="due_date" class="form form-control" value="{{ $task->due_date->format('Y-m-d') }}" readonly disabled />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="status">Priority</label>
                            <select name="status" id="status" class="form-select" readonly disabled>
                                <option value="" selected>{{ $task->priority_text }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="user">Assigned to</label>
                            <select class="form-select"  readonly disabled>
                                <option value="" selected>{{ $task->user->name }}</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
