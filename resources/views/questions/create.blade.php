@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>{{ __('Create Question') }}</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back
                                    Question</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('questions.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="question-title">Title</label>
                                <input type="text" class="form-control {{$errors->has('title')?'is-invalid':''}}"
                                       id="question-title" name="title" value="{{old('title')}}">
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">
                                        <strong>
                                            {{$errors->first('title')}}
                                        </strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="question-body">Body</label>
                                <textarea name="body" id="question-body" rows="10"
                                          class="form-control  {{$errors->has('body')?'is-invalid':''}}">{{old('body')}}</textarea>
                                @if($errors->has('body'))
                                    <div class="invalid-feedback">
                                        <strong>
                                            {{$errors->first('body')}}
                                        </strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
