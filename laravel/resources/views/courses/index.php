@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tous les cours</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Ajouter un cours</a>

    @foreach ($courses as $course)
        <div class="card my-3">
            <div class="card-body">
                <h3>{{ $course->title }}</h3>
                <p>{{ $course->description }}</p>
                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-secondary">Voir</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
