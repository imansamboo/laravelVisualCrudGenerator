@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit {{ $extension->name }}</h3>
                {!! Form::model($extension, ['route' => ['extensions.update', $extension], 'method' =>'patch', 'files' => true])!!}
                @include('extensions._form', ['model' => $extension])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection