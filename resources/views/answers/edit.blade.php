@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3>Edit answer for question {{$question->title}}</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('questions.answers.update',[$question->id,$answer->id])}}"
                                  method="post">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                            <textarea class="form-control {{$errors->has('body')?'is-invalid':''}}" name="body"
                                      rows="5">{{old('body',$answer->body)}}</textarea>
                                    @if($errors->has('body'))
                                        <div class="invalid-feedback">
                                            <strong>{{$errors->first('body')}}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary mt-2">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
