@extends('layouts.main')

@section('content')
    <div class="container mb-5">
        <h2>Edit {{ $classroom->name }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST"> <!-- PATCH non può essere messo qui perché il form html non può utilizzarlo, viene infatti dichiarato sotto con lo strumento laravel method() -->
                @csrf 
                @method('PATCH') <!-- permette un passaggio parziale di dati e fare update -->

                <div class="form-group">
                    <label for="name">Classroom name</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name', $classroom->name) }}"> <!-- per ritrovarmi quando clicco edit con il testo originale (da modificare, stessa cosa sotto con la description) -->
                </div>
                <div class="form-group">
                    <label for="description">Classroom description</label>
                    <textarea class="form-control" type="text" name="description">{{ old('description', $classroom->description) }}</textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>
            </form>
    </div>
@endsection