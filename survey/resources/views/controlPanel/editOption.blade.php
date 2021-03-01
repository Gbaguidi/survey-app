@extends('layouts.appCustom')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex;align-content:center;">
                    <div class="col-sm-11">
                        Update option
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('questions.edit',$option->question->id)}}" class="btn btn-info"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('options.update',$option->id)}}">
                        @csrf
						{{ method_field('patch') }}
                        <div class="form-group">
                            <label for="value">Value</label>
                            <input class="form-control" value={{$option->value}} placeholder="Value" type="text" name="value" id="value" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Text to show</label>
                            <input class="form-control" value={{$option->text}} placeholder="text" type="text" name="text" id="text" required>
                        </div>
                        <button style="width: 100%;text-align:center" type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
