@extends('layouts.appCustomSite')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex;align-content:center;">
                    <div class="col-sm-11">
                        {{$survey->title }}
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('takeSurveys.index')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('takeSurveys.store')}}">
                        @csrf
                        <input type="text" name="survey_id" value="{{$survey->id}}" id="survey_id" hidden>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" required>
                        </div>
                        @foreach ($survey->questions as $question)
                            <div class="form-group">
                                @if($question->type === 'text')
                                    <label for="{{$question->id}}">{{$question->question}}</label>
                                    <input class="form-control" type="text" name="{{$question->id}}" id="{{$question->id}}">
                                @elseif($question->type === 'textarea')
                                    <label for="{{$question->id}}">{{$question->question}}</label>
                                    <textarea class="form-control" name="{{$question->id}}" id="{{$question->id}}"></textarea>
                                @elseif($question->type === 'select')
                                    <label for="{{$question->id}}">{{$question->question}}</label>
                                    <select class="form-control" name="{{$question->id}}" id="{{$question->id}}">
                                        <option value="" selected>Choose a value</option>
                                        @foreach($question->options as $option)
                                        <option value="{{$option->value}}">{{$option->text}}</option>
                                        @endforeach
                                    </select>
                                @elseif($question->type === 'radio')
                                    <label >{{$question->question}}</label>
                                    @foreach($question->options as $option)
                                        <label for="{{'radio'.$option->id}}">{{$option->text}}</label>
                                        <input type="radio" name="{{$question->id}}" id="{{'radio'.$option->id}}" value="{{$option->value}}">
                                    @endforeach
                                @elseif($question->type === 'checkbox')
                                    @foreach($question->options as $option)
                                        <label for="{{'checkbox'.$option->id}}">{{$option->text}}</label>
                                        <input type="checkbox" name="{{$question->id}}" id="{{'checkbox'.$option->id}}" value="{{$option->value}}">
                                    @endforeach
                                @elseif($question->type === 'date')
                                    <label for="{{$question->id}}">{{$question->question}}</label>
                                    <input class="form-control" type="date" name="{{$question->id}}" id="{{$question->id}}">
                                @elseif($question->type === 'time')
                                    <label for="{{$question->id}}">{{$question->question}}</label>
                                    <input class="form-control" type="time" name="{{$question->id}}" id="{{$question->id}}">
                                @elseif($question->type === 'number')
                                    <label for="{{$question->id}}">{{$question->question}}</label>
                                    <input class="form-control" type="number" name="{{$question->id}}" id="{{$question->id}}">
                                @endif
                            </div>
                        @endforeach
                        <button style="width: 100%;text-align:center" type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
