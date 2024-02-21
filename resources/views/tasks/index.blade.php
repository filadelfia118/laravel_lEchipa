@extends('layouts.base')

@section('title', 'tasks')

@section('content')
<h4>Lista de sarcini </h4>
<a href="{{route('tasks.create')}}"></a>
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nume</th>
                <th>Descriere</th>
                <th>Stare</th>
                <th>Data</th>
            
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$task->nume}}</td>
                    <td>{{$task->descriere}}</td>
                    <td>{{$task->stare}}</td>
                    <td>{{$task->data}}</td>
                    <td>
                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                           class="btn btn-sm btn-outline-warning" >
                            Edit
                        </a>
                        <button class="btn btn-sm btn-outline-danger delete-task"
                                data-id="{{$task->id}}">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No tasks</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
@endsection