@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notities</div>
            </div>
        </div>
        @foreach($user->notities as $note)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{$note->body}}

                            @if((Auth::user()->id) === ($note->user_id))
                                <div class="pull-right">
                                    <a href="{{url('')}}/notitie/{{$note->id}}" class="btn btn-primary">Edit</a>
                                    <tb>
                                    <a href="{{url('')}}/notitie/{{$note->id}}/remove" class="btn btn-danger">Delete</a>                            
                                </div>

                            @else
                                <a href="" class="pull-right">{{$note->user->name}}</a>
                            @endif
                    </div>
                </div>
            </div>
        @endforeach

        @if((Auth::user()->id) === ($note->user_id))
            <form method="POST" action="{{url('')}}/notitie/{{Auth::user()->id}}" class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <textarea name="body" class="form-control" required>{{old('body')}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="_token" value="{{csrf_token()}}">submit</button>
                    <a href="{{url('')}}/home" class="btn btn-primary">Home</a>
                </div>
            </form>
        @else
            <div class="col-md-8 col-md-offset-2">
                <a href="{{url('')}}/home" class="btn btn-primary">Home</a>
            </div>
        @endif
    </div>
</div>
@endsection