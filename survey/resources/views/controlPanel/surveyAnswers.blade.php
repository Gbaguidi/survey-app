
@extends('layouts.appCustomSite')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex;align-content:center;">
                    <div class="col-sm-11">
                        {{ 'Answers for '.$survey->title.' survey.'}}
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('home')}}" class="btn btn-info"><i class="fa fa-home"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    @forelse ($survey->takeSurveys as $takeSurvey)
                        <div class="row accordion-header">
                            <div class="col-md-1" >
                                {{$loop->index}}
                            </div>
                            <div class="col-md-8" >
                                {{$takeSurvey->email}}
                            </div>
                            <div class="col-md-1" >
                                <a href="{{route('surveys.answer',$takeSurvey->id)}}" class="btn btn-warning">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div style="text-align: center">Nothing to show</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
