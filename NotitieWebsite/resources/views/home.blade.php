@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notities</div>
            </div>
        </div>
        @foreach($notities as $note)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{$note->body}}

                            @if((Auth::user()->id) === ($note->user->id))
                                <div class="pull-right">
                                    <a href="notitie/{{$note->id}}" class="btn btn-primary">Edit</a>
                                    <tb>
                                    <a href="notitie/{{$note->id}}/remove" class="btn btn-danger">Delete</a>                            
                                </div>

                            @else
                                <a href="{{url('')}}/notities/user/{{$note->user->id}}" class="pull-right">{{$note->user->name}}</a>
                            @endif
                    </div>
                </div>
            </div>
        @endforeach

        <form method="POST" action="notitie/{{Auth::user()->id}}" class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <textarea name="body" class="form-control" required>{{old('body')}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="_token" value="{{csrf_token()}}">submit</button>
            </div>
        </form>

        @if(count($errors))
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
