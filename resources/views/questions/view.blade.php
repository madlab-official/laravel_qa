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

                    <div class="card-body">
                        {!! $question->body !!}
                    </div>
                    <div class="card-footer text-right text-muted">
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
                                    {!! $answer->body !!}
                                    <div class="text-right" >
                                        <span class="text-muted">Answered {{$answer->created_date}}</span>
                                        <div class="media mt-2">
                                            <a href="{{$answer->user->url}}" class="pr-2">
                                                <img src="{{$answer->user->avatar}}" alt="{{$answer->user->url}}" width="20px">
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
