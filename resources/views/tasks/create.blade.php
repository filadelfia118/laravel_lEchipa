@extends('layouts.index')

@section('title', 'Create Tasks')

@section('content')
<form action="{{route('task.store')}}" method="post">
    @csrf
    <label for="task_id">Task:</label>
    <label for="nume"id="nume">Nume</label>
    <input type="name" name="name" id="name" placeholder="Name"><br>
    <label for="descriere"id="descriere">Descriere</label>
    <input type="descriere" name="descriere" id="descriere" placeholder="Descriere"><br>
    <button type="submit">Save</button>
</form>
@endsection