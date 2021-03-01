@extends('layouts.appCustom')

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
                        <a href="{{route('home')}}" class="btn btn-info"><i class="fa fa-home"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <h3>{{$survey->title}}</h3>
                    <div>
                        {{$survey->description}}
                    </div>
                    <hr>
                    <div>Form entries</div>
                        @forelse ($survey->questions as $question)
                        <div class="row accordion-header">
                            <div class="col-md-10" >
                                {{ $question->question }}
                            </div>
                            <div class="col-md-1">
                                <a href="{{route('questions.edit',$question->id) }}" class="btn btn-warning btn-sm" ><i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-1">
                                <form method="POST" action="{{route('questions.destroy',$question->id) }}" style="display:inline">
                                    @csrf
                                    {{method_field('delete')}}
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @empty
                            <div style="text-align: center">Nothing to show. Add entries below.</div>
                        @endforelse
                    </ul>

                    <hr>
                    <div>Add new form entry</div>
                    <form method="POST" action="{{route('questions.store')}}" class="repeater">
                        @csrf
                        <input type="text" name="survey_id" id="survey_id" hidden value="{{$survey->id}}" required>
                        <div class="row">
                            <div data-repeater-list="entries" class=" col-md-10">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class=" col-md-12 col-lg-5 form-group">
                                            <label >Entry's title</label>
                                            <textarea autocomplete="off" placeholder="Entry's title" name="question" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group col-md-12 col-lg-5">
                                            <label >Entry type</label>
                                            <select class="form-control" name="type" required >
                                                <option value="" disabled selected>Choose a value</option>
                                                <option value="text">Texte</option>
                                                <option value="textarea">Textarea</option>
                                                <option value="select">Select</option>
                                                <option value="radio">Radio button</option>
                                                <option value="checkbox">Checkbox</option>
                                                <option value="date">Date</option>
                                                <option value="time">Time</option>
                                                <option value="number">Number</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-1 col-lg-1">
                                            <button data-repeater-delete type="button" value="Delete" class="btn btn-danger" style="width: max-content;height:max-content;position: absolute;bottom:0px"><i class="fa fa-trash-o"></i>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <button data-repeater-create type="button" value="Add" class="btn btn-success" style="width: max-content;height:auto"><i class="fa fa-plus"></i>Add entry</button>
                            </div>
                        </div>
                        <button style="width: 100%;text-align:center" type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
