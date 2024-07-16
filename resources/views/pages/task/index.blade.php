@extends('layouts.app')
@include('layouts.navbar')
@section('content')

    <div class="mt-5">
        <h5>Tasks</h5>
        <hr>
        <div class="d-flex flex-row-reverse">
            <a class="btn btn-outline-secondary" href="{{ url('/task/create') }}">Create New</a>
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
                <th>Task</th>
                <th>Due Date</th>
                <th>Priority</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @if (count($tasks))
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->project->project_name }}</td>
                            <td>{{ $task->task_name }}</td>
                            <td>{{ $task->due_date->format('m/d/Y') }}</td>
                            <td>
                                <span
                                    class="badge rounded-pill text-bg-{{ $task->priority_text == 'Low' ? 'secondary' : ($task->priority_text == 'Medium' ? 'warning' : 'danger') }}">
                                    {{ $task->priority_text }}
                                </span>
                            </td>
                            <td style="width:10%">
                                <div class="row text-center">
                                    <div class="col">
                                        <a href="{{ route('task.show', $task->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('task.edit', $task->id) }}" class="btn btn-info btn-sm text-white"><i class="fas fa-edit"></i></a>

                                        <form id="deleteForm" action="{{ route('task.destroy', $task) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">
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
        {{ $tasks->links() }}
    </div>
@endsection
