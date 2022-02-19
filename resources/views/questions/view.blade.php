@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts._message')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>{{ $question->title }}</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to
                                    Questions</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body  d-flex justify-content-between">
                        <div class=" vote-controls">
                            <a title="This question is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">1234</span>
                            <a title="This question is not useful" class="vote-down">
                                <i class="fas fa-caret-down fa-3x"> </i>
                            </a>

                            <a title="Click to mark as favorite question" class="vote-down mt-2 favorite favorited">
                                <i class="fas fa-star fa-2x"> </i>
                                <span class="favorites-count">1234</span>
                            </a>
                        </div>
                        <div class="text-justify">
                            {!! $question->body !!}
                        </div>
                    </div>

                    <div class="card-footer text-muted text-center">

                        {{"By ".$question->user->name}}
                    </div>
                </div>
            </div>
        </div>
        @include('answers._index',[
            'answers'=>$question->answers,
            'answersCount'=>$question->answers_count,])
        @include('answers._create')
    </div>
@endsection
