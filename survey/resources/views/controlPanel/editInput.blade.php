@extends('layouts.appCustom')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex;align-content:center;">
                    <div class="col-sm-11">
                        Update the question
                    </div>
                    <div class="col-sm-1">
                        <a href="{{route('surveys.show',$question->survey->id)}}" class="btn btn-info"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('questions.update',$question->id)}}" style="margin-bottom:20px ">
                        @csrf
						{{ method_field('patch') }}
                        <div class="form-group">
                            <label for="question">Title</label>
                            <textarea autocomplete="off" class="form-control" placeholder="Title of question" type="text" name="question" id="question" required>{{$question->question}}</textarea>
                            <br>
                            <p>Type: {{$question->type}}</p>
                        </div>
                        <button style="width: 100%;text-align:center" type="submit" class="btn btn-primary">Save</button>
                    </form>
                    @if ($question->type=="select" || $question->type=="radio" ||$question->type=="checkbox")
                        <hr>
                        <h3>Options</h3>
                            <hr>
                            <h5>Create new options</h5>
                            <form method="POST" action="{{route('options.store')}}" style="margin-bottom:20px ">
                                @csrf
                                <input autocomplete="off" type="text" name="question_id" id="question_id" hidden value="{{$question->id}}">
                                <div class="row repeater">
                                    <div data-repeater-list="entries" class=" col-md-10">
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class=" col-md-12 col-lg-5 form-group">
                                                    <label for="value">Option value</label>
                                                    <input autocomplete="off" id="value" type="text" name="value" class="form-control" required>
                                                </div>
                                                <div class=" col-md-12 col-lg-5 form-group">
                                                    <label for="text">Text to show</label>
                                                    <input autocomplete="off" id="text" type="text" name="text" class="form-control" required>
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
                        <hr>
                        <h5>Available Options</h5>
                        <div >
                            @forelse ($question->options as $option)
                            <div class="row option-row">
                                <div class="col-md-1">
                                    {{$loop->index}}
                                </div>
                                <div class="col-md-4">
                                    Value: {{$option->value}}
                                </div>
                                <div class="col-md-5">
                                    Text: {{$option->text}}
                                </div>
                                <div class="col-md-1">
                                    <a href="{{route('options.edit',$question->id) }}" class="btn btn-warning btn-sm" ><i class="fa fa-edit"></i></a>
                                </div>
                                <div class="col-md-1">
                                    <form method="POST" action="{{route('options.destroy',$option->id) }}" style="display:inline">
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
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
