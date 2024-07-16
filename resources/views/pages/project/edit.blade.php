@extends('layouts.app')
@include('layouts.navbar')
@section('content')
    <div class="mt-5">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col mt-2">
                        <h5>Edit Project</h5>
                    </div>
                    <div class="col">
                        <a href="{{ url('/project') }}" class="btn btn-outline-secondary float-end">Back</a>
                    </div>
                </div>
            </div>

            <form action="{{ route('project.update', $project) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="project_name">Project Name</label>
                                <input type="text" id="project_name" name="project_name" class="form form-control" value="{{ $project->project_name }}"/>
                            </div>
                            @error('project_name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form form-control" rows="3">{{ $project->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="due_date">Due Date</label>
                                <input type="date" id="due_date" name="due_date" class="form form-control" value="{{ $project->due_date->format('Y-m-d') }}" />
                            </div>
                            @error('due_date')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="{{ $project->status }}" selected>{{ $project->status_text }}</option>
                                    <option value="0">Todo</option>
                                    <option value="1">In-progress</option>
                                    <option value="2">Completed</option>
                                </select>
                                @error('status')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2 mb-2 float-end">
                        <div class="col">
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
