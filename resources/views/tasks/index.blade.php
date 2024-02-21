@extends('layouts.index')

@section('title', 'tasks')

@section('content')
<h4>Lista de sarcini </h4>
<a href="{{route('tasks.create')}}">Creare Task</a>
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
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = "{{ session('success') }}";
        const deleteButtons = document.querySelectorAll('.delete-task');
        if(deleteButtons){
            [...deleteButtons].map( btn => {
                btn.addEventListener('click', () => {
                    const id = btn.dataset.id;
                    Swal.fire({
                        title: 'Sunteti sigur?',
                        text: "Doriti sa stergeti inregistrarea?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#000',
                        confirmButtonText: 'Da',
                        cancelButtonText: 'Nu'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.delete(`/tasks/${id}`)
                                .then(function (response) {
                                    if (response.data.success) {
                                        Swal.fire({
                                            title: 'Succes!',
                                            text: response.data.message,
                                            icon: 'success',
                                            confirmButtonText: 'OK',
                                            confirmButtonColor: '#d33'
                                        }).then(function () {
                                            location.reload();
                                        });
                                    }
                                })
                                .catch(function (error) {
                                    console.log(error);
                                    Swal.fire({
                                        title: 'Eroare!',
                                        text: 'A aparut o eroare la stergerea inregistrarii.',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                });
                        }
                    });
                });
            });
        }
        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: successMessage,
            });
        }
    });
</script>

    
@endpush