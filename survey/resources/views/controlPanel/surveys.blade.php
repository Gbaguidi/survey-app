@extends('layouts.appCustom')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex;align-content:center;">
                    <div class="col-sm-9">
                        {{ __('Survey lists') }}
                    </div>
                    <div class="col-sm-3">
                        <a href="{{route('surveys.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Survey</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            @foreach (Auth::user()->surveys as $survey)
                                <tr>
                                    <td>
                                        {{$loop->index}}
                                    </td>
                                    <td>
                                        {{$survey->title}}
                                    </td>
                                    <td>
                                        {{$survey->description}}
                                    </td>
                                    <td >
                                        <form method="POST" action="{{route('surveys.destroy',$survey->id)}}" style="display:inline">
                                            @csrf
                                            {{method_field('delete')}}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                        <a href="{{route('surveys.show',$survey->id)}}" class="btn btn-info">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('surveys.edit',$survey->id)}}" class="btn btn-warning">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('surveys.attendees',$survey->id)}}" class="btn btn-success">
                                            <i class="fa fa-file" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
