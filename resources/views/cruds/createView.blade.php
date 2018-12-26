@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>step 3</h1>
                <h3>creating views for <b>{{$crud->name}}</b> crud</h3>
                {!! Form::open(['route' => 'cruds.storeٰView'])!!}
                @foreach(/*App\MigrationField::where('crud_id', '=', $crud->id)->get()*/$crud->migrationFields as $migrationField)
                    <button class="btn-success" style="border-color: #DBDBDB">{{$migrationField->name}}</button>
                    <div class="form-group {!! $errors->has('viewType-' . $migrationField->id) ? 'has-error' : '' !!}">
                        {!! Form::label('viewType-' . $migrationField->id, 'Select Type of View') !!}
                        {{-- Simplify things, no need to implement ajax for now --}}
                        {!! Form::select('viewType-' . $migrationField->id, $configView[$migrationField->type], null, ['class'=>'form-control js-selectize']) !!}

                        {!! $errors->first('viewType-' . $migrationField->id, '<p class="help-block">:message</p>') !!}
                    </div>
                <input type="hidden" name="id" value="{{$crud->id}}">
                @if($migrationField->type == 'enum')
                    <h3>Items</h3>
                    <ul>
                                @foreach(explode("#", $migrationField->options) as $option)
                                    <li class="col-md">{{ $loop->iteration . '-' . $option}}</li>
                                @endforeach
                    </ul>

                @else
                    <div class="form-group {!! $errors->has('viewOptions-' . $migrationField->id) ? 'has-error' : '' !!}">
                            {!! Form::label('viewOptions-' . $migrationField->id, 'Select Options') !!}
                            {{-- Simplify things, no need to implement ajax for now --}}
                            {!! Form::text('viewOptions-' . $migrationField->id, null, ['class'=>'form-control']) !!}

                            {!! $errors->first('viewOptions-' . $migrationField->id, '<p class="help-block">:message</p>') !!}
                    </div>
                @endif

                @endforeach
                {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection