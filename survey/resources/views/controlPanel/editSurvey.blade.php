@extends('layouts.appCustom')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex;align-content:center;">
                    <div class="col-sm-11">
                        Update the survey
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('home')}}" class="btn btn-info"><i class="fa fa-home"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('surveys.update',$survey->id)}}">
                        @csrf
						{{ method_field('patch') }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" value={{$survey->title}} placeholder="Title of Survey" type="text" name="title" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" placeholder="Purpose of the survey" name="description" id="description" required>{{$survey->description}}</textarea>
                        </div>
                        <button style="width: 100%;text-align:center" type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
