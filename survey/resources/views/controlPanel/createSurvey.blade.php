@extends('layouts.appCustom')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex;align-content:center;">
                    <div class="col-sm-11">
                        Create a new Survey
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('home')}}" class="btn btn-info"><i class="fa fa-home"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('surveys.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="year">Title</label>
                            <input class="form-control" placeholder="Title of Survey" type="text" name="title" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="year">Description</label>
                                <textarea class="form-control" placeholder="Purpose of the survey" name="description" id="description" >
                            </textarea>
                        </div>
                        <button style="width: 100%;text-align:center" type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
