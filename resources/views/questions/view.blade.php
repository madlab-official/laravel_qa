@extends('layouts.app')

@section('content')
    <div class="container">
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
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>{{$question->answers_count." ".Str::plural("Answer",$question->answers_count)}}</h2>
                        </div>
                        <hr>
                        @foreach($question->answers as $answer)
                            <div class="media">
                                <div class="media-body">
                                    <div class="d-flex justify-content-between">
                                        <div class=" vote-controls">
                                            <a title="This answer is useful" class="vote-up">
                                                <i class="fas fa-caret-up fa-3x"></i>
                                            </a>
                                            <span class="votes-count">1234</span>
                                            <a title="This answer is not useful" class="vote-down">
                                                <i class="fas fa-caret-down fa-3x"> </i>
                                            </a>

                                            <a title="Click to mark as favorite answer" class="vote-down mt-2 vote-accepted">
                                                <i class="fas fa-check fa-2x"> </i>
                                            </a>
                                        </div>

                                        <div class=" text-justify">
                                            {!! $answer->body !!}
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-muted">Answered {{$answer->created_date}}</span>
                                        <div class="media mt-2">
                                            <a href="{{$answer->user->url}}" class="pr-2">
                                                <img src="{{$answer->user->avatar}}" alt="{{$answer->user->url}}"
                                                     width="20px">
                                            </a>
                                            <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
