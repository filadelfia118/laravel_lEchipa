@extends('layouts.index')

@section('title', 'Create Tasks')

@section('content')
<form class="form form-controller" action="{{route('tasks.store')}}" method="post">
    @csrf
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Creare Sarcina!!</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nume">Nume</label>
                                <input type="nume" name="nume" id="nume" placeholder="Name"><br>
                            
                                <label for="descriere"id="descriere">Descriere</label>
                                <input type="descriere" name="descriere" id="descriere" placeholder="Descriere"><br>

                                <label for="stare">Stare:</label>
                                <select class="form-control" name="stare" id="stare">
                                    <option value="În curs">În curs</option>
                                    <option value="Finalizată">Finalizată</option>
                                    <option value="Anulată">Anulată</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Adaugă</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
</form>
@endsection