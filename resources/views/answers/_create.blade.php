<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>Enter your Answer</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('questions.answers.store',$question->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control {{$errors->has('body')?'is-invalid':''}}" name="body"
                                      rows="5"></textarea>
                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('body')}}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary mt-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
