@extends('layouts.app')
@include('layouts.navbar')
@section('content')
    <div class="mt-5">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col mt-2">
                        <h5>Create Task</h5>
                    </div>
                    <div class="col">
                        <a href="{{ url('/tasks') }}" class="btn btn-outline-secondary float-end">Back</a>
                    </div>
                </div>
            </div>

            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="project">Project Name</label>
                                <select class="form-select" name="project" id="project_id">
                                    <option value="" selected>Please Choose</option>
                                    @foreach ($projects as $proj)
                                        <option value="{{ $proj->id }}">{{ $proj->project_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('project')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="task_name">Task Name</label>
                                <input id="task_name" name="task_name" class="form form-control" rows="3" value="{{ old('task_name') }}" />
                                @error('task_name')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form form-control" rows="3">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="due_date">Due Date</label>
                                <input type="date" id="due_date" name="due_date" class="form form-control"
                                    value="{{ old('due_date') }}" />
                            </div>
                            @error('due_date')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Priority</label>
                                <select name="priority" id="priority" class="form-select">
                                    <option value="" selected>Select Priority</option>
                                    <option value="0">Low</option>
                                    <option value="1">Medium</option>
                                    <option value="2">High</option>
                                </select>
                                @error('priority')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="user">Assigned to</label>
                                <select class="form-select" name="user" id="user">
                                    <option value="" selected>Please Choose</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('user')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-2 mb-2 float-end">
                        <div class="col">
                            <button type="submit" class="btn btn-success btn-block">Add Task</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
