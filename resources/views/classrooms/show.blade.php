@extends('layouts.main')

@section('content')
    <div class="container mb-5">
        <h2>{{ $classroom->name }} Details</h2>
        <h6>ID: {{ $classroom->id }}</h6>
        <a class="btn btn-primary" href="{{ route('classrooms.edit', $classroom->id) }}">Edit</a>
        <hr>
        <p>
            {{ $classroom->description }}
        </p>   
        <hr>

        <div class="mb-3">Created at: {{ $classroom->created_at }}</div>
        <div class="mb-3">Updated at: {{ $classroom->updated_at }}</div>

    </div>
@endsection