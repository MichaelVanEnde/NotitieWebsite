@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notitie</div>
                <div class="panel-body">{{$notitie->body}}</div>
            </div>
        </div>
            @if((Auth::user()->id) === ($notitie->user->id))
                <form method="POST" action="{{$notitie->id}}/update" class="col-md-8 col-md-offset-2">
                    {{method_field('PATCH')}}

                    <div class="form-group">
                        <textarea name="body" class="form-control" required>{{old('body')}}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="_token" value="{{csrf_token()}}">submit</button>
                        <a href="{{url('')}}/home" class="btn btn-primary">Back</a>
                        <a href="{{$notitie->id}}/remove" class="btn btn-danger pull-right">Delete</a>
                    </div>

                </form>
            @else
                <a href="{{url('')}}/home" class="btn btn-primary">Home</a>
            @endif

        
    </div>
</div>
@endsection