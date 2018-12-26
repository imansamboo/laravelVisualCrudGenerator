<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <select name="name" class="form-control" id="name" >
    @foreach (json_decode('{"amir":"Amir" ,"iman":"Iman"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($sample->name) && $sample->name == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('examples') ? 'has-error' : ''}}">
    <label for="examples" class="control-label">{{ 'Examples' }}</label>
    <select name="examples" class="form-control" id="examples" >
    @foreach (json_decode('{"example1":"Example1" ,"example2":"Example2"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($sample->examples) && $sample->examples == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('examples', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
