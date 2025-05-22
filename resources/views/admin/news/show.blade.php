@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold">{{ $news->title }}</h1>
        <p class="mt-2">{{ $news->content }}</p>

        @if ($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" alt="News Image" class="mt-4 w-full max-w-md">
        @endif
    </div>
@endsection
