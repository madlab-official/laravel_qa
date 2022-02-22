<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{$answersCount." ".Str::plural("Answer",$answersCount)}}</h2>
                </div>
                <hr>
                @foreach($answers as $answer)
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

                                    <a title="Click to mark as favorite answer"
                                       class="vote-down mt-2 {{$answer->status}}">
                                        <i class="fas fa-check fa-2x"> </i>
                                    </a>
                                </div>

                                <div class=" text-justify">
                                    {!! $answer->body !!}
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="edit-delete-button">
                                    @can ('update', $answer)
                                        <a href="{{route('questions.answers.edit',[$question->id,$answer->id])}}"
                                           class="btn btn-sm btn-outline-info">Edit</a>
                                    @endcan
                                    @can ('delete', $answer)
                                        <form class="form-delete"
                                              action="{{route('questions.answers.destroy',[$question->id,$answer->id])}}"
                                              method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-outline-danger" type="submit"
                                                    onclick="return confirm('Are you sure?')">Delete
                                            </button>
                                        </form>
                                    @endcan
                                </div>
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
