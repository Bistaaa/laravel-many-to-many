@extends('layouts.app')

@section('content')

    <div class="container text-center pt-5">
        <h1>{{ $project -> name }}</h1>
        @if ($project -> picture)
            <img src="{{ asset('storage/' . $project -> picture) }}" width="250px">
        @endif
        <p>
            {{ $project -> description }}
        </p>
        <div class="row my-3">
            <span class="col bg-dark text-light rounded mx-3">
                Start date: {{ $project -> start_date }}
            </span>
            <span class="col bg-dark text-light rounded mx-3">
                End date: {{ $project -> end_date }}
            </span>
        </div>
        <div class="row my-3">    
            <span class="col bg-dark text-light rounded mx-3">
                Type: {{ $project -> type -> name }}
            </span>
            <span class="col bg-dark text-light rounded mx-3">
                Difficulty: {{ $project -> difficulty }}
            </span>
        </div>
        <div class="row my-3">
            <span class="col bg-dark text-light rounded mx-3">
                Technologies:
                @if (count($project -> technologies) > 0)
                    @foreach ($project -> technologies as $technology)
                        @if($loop->last)
                            {{ $technology -> name }}
                        @else
                            {{ $technology -> name }},
                        @endif
                    @endforeach
                @else
                    NO TECHNOLOGY
                @endif
            </span>
        </div>
    </div>

@endsection