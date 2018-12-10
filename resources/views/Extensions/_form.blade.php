<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('secret') ? 'has-error' : '' !!}">
    {!! Form::label('secret', 'Secret') !!}
    {!! Form::text('secret', null, ['class'=>'form-control']) !!}
    {!! $errors->first('secret', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('extension') ? 'has-error' : '' !!}">
    {!! Form::label('extension', 'Extension') !!}
    {!! Form::text('extension', null, ['class'=>'form-control']) !!}
    {!! $errors->first('extension', '<p class="help-block">:message</p>') !!}
</div>




{!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}