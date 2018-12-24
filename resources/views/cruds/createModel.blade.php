@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>step 2</h1>
                <h3>creating model for <b>{{$crud->name}}</b> crud</h3>
                {!! Form::open(['route' => 'cruds.storeModel'])!!}
                <div class="form-group {!! $errors->has('modelName') ? 'has-error' : '' !!}">
                    {!! Form::label('modelName', 'Model Name') !!}
                    {!! Form::text('modelName', substr(ucwords($crud->name), 0, -1), ['class'=>'form-control']) !!}
                    {!! $errors->first('modelName', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {!! $errors->has('fillables') ? 'has-error' : '' !!}">
                    {!! Form::label('fillables', 'Select Fillables') !!}
                    {{-- Simplify things, no need to implement ajax for now --}}
                    {!! Form::select('fillables[]', [''=>'']+App\MigrationField::where('crud_id', '=', $crud->id)->pluck('name', 'id')->all(), null, ['class'=>'form-control js-selectize', 'multiple']) !!}

                    {!! $errors->first('fillables', '<p class="help-block">:message</p>') !!}
                </div>

                {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection