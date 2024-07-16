@extends('layouts.app')
@include('layouts.navbar')
@section('content')
    <div class="mt-5">
        <h5>Projects</h5>
        <hr>
        <div class="d-flex flex-row-reverse">
            <a class="btn btn-outline-secondary" href="{{ url('/project/create') }}">Create New</a>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success mt-2">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-bordered mt-2">
            <thead>
                <th>ID</th>
                <th>Project Name</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Total Tasks</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @if (count($projects))
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->project_name }}</td>
                            <td>{{ $project->due_date->format('m/d/Y') }}</td>
                            <td>
                                <span
                                    class="badge rounded-pill text-bg-{{ $project->status_text == 'Todo' ? 'primary' : ($project->status_text == 'In-progress' ? 'success' : 'secondary') }}">
                                    {{ $project->status_text }}
                                </span>
                            </td>
                            <td>{{ $project->tasks_count }}</td>
                            <td style="width:10%">
                                <div class="row text-center">
                                    <div class="col">
                                        <a href="{{ route('project.show', $project->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('project.edit', $project->id) }}"
                                            class="btn btn-info btn-sm text-white"><i class="fas fa-edit"></i>
                                        </a>

                                        <form id="deleteForm" action="{{ route('project.destroy', $project) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this project?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
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
        {{ $projects->links() }}
    </div>
@endsection
