@extends('layouts.app')
@include('layouts.navbar')
@section('content')
    <div class="mt-5">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col mt-2">
                        <h5>View Project</h5>
                    </div>
                    <div class="col">
                        <a href="{{ url('/project/') }}" class="btn btn-outline-secondary float-end">Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input type="text" id="project_name" name="project_name" class="form form-control"
                                value="{{ $project->project_name }}" readonly disabled />
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form form-control" rows="3" readonly disabled>{{ $project->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="due_date">Due Date</label>
                            <input type="date" id="due_date" name="due_date" class="form form-control"
                                value="{{ $project->due_date }}" readonly disabled />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-select" readonly disabled>
                                <option value="" selected>{{ $project->status_text }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
