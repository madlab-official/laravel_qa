@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts._message')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>{{ __('All Question') }}</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask
                                    Question</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @foreach($questions as $question)
                            <div class="media d-flex">
                                <div class="counters">
                                    <div class="vote">
                                        <strong>{{$question->votes}}</strong>{{ Str::plural(' vote',$question->votes)}}
                                    </div>
                                    <div class="status {{$question->status}}">
                                        <strong>{{$question->answers}}</strong>{{Str::plural(' answer',$question->answers)}}
                                    </div>
                                    <div class="view">
                                        {{$question->views.Str::plural(' view',$question->views)}}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="a">
                                            <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
                                            <p class="lead">
                                                Asked By
                                                <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                                <small class="text-muted">{{$question->created_date}}</small>
                                            </p>
                                            <p class="text-justify">
                                                {{Str::limit($question->body,400)}}
                                            </p>
                                        </div>
                                        <div class="ml-auto">
                                            @if(auth()->user()->can('update-question',$question))
                                                <a href="{{route('questions.edit',$question->id)}}"
                                                   class="btn btn-sm btn-outline-info">Edit</a>
                                            @endif
                                            @if(auth()->user()->can('delete-question',$question))
                                                <form class="form-delete"
                                                      action="{{route('questions.destroy',$question->id)}}"
                                                      method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-outline-danger" type="submit"
                                                            onclick="return confirm('Are you sure?')">Delete
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        <div>
                            {{$questions->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
