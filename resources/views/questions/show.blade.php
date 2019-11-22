@extends('layouts.app')

@section('content')
    <div class="container">
        <question :question="{{ $question }}"></question>

        @include ('answers._index', [
            'answers' => $question->answers,
            'answersCount' => $question->answers_count,
        ])
        @include ('answers._create')
    </div>
@endsection
