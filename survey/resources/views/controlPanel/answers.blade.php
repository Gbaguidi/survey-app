
@extends('layouts.appCustomSite')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex;align-content:center;">
                    <div class="col-sm-11">
                        {{ 'Answers of '.$takeSurvey->email.'.'}}
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('surveys.attendees',$takeSurvey->survey->id)}}" class="btn btn-info"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    @foreach ($takeSurvey->answers as $answer)
                        <div>
                            <h5>{{$answer->question->question}}</h5>
                            <p>{{$answer->response}}</p>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
