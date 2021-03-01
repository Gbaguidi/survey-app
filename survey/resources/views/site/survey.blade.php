
@extends('layouts.appCustomSite')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >
                        {{ __('Survey lists') }}
                </div>
                <div class="card-body">
                    @if ( isset($message))
                        <div class="alert alert-success" role="alert">
                            {{ $message}}
                        </div>
                    @endif
                    @foreach ($surveys as $survey)
                        <div class="row accordion-header">
                            <div class="col-md-1" >
                                {{$loop->index}}
                            </div>
                            <div class="col-md-8" >
                                {{$survey->title}}
                            </div>
                            <div class="col-md-1" >
                                <a href="{{route('takeSurveys.show',$survey->id)}}" class="btn btn-info">
                                    Take survey
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
