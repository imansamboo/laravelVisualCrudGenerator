@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Extension <small><a href="{{ route('extensions.create') }}" class="btn btn-warning btn-sm">New Extension</a></small></h3>
                {!! Form::open(['url' => 'extensions', 'method'=>'get', 'class'=>'form-inline']) !!}
                <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
                    {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Type name ...']) !!}
                    {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
                </div>

                {!! Form::submit('Search', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td>Name</td>
                        <td>secret</td>
                        <td>extension</td>
                        <td>actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($extensions as $extension)
                        <tr>
                            <td>{{ $extension->name }}</td>
                            <td>{{ $extension->secret}}</td>
                            <td>{{ $extension->extension}}</td>
                            <td>
                                {!! Form::model($extension, ['route' => ['extensions.destroy', $extension], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                                <a href="{{ route('extensions.edit', $extension->id)}}" class="btn btn-xs btn-success" style="margin-right: 2%;">Edit</a>
                                {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                                {!! Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $extensions->appends(compact('q'))->links() !!}
            </div>
        </div>
    </div>
@endsection