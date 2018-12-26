<div class="form-group {{ $errors->has('family') ? 'has-error' : ''}}">
    <label for="family" class="control-label">{{ 'Family' }}</label>
    <select name="family" class="form-control" id="family" >
    @foreach (json_decode('{"father":"Father" ,"mother":"Mother"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($mersad->family) && $mersad->family == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('family', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="control-label">{{ 'Age' }}</label>
    <select name="age" class="form-control" id="age" >
    @foreach (json_decode('{"mersad1":"Mersad1" ,"shahab2":"Shahab2"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($mersad->age) && $mersad->age == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('group') ? 'has-error' : ''}}">
    <label for="group" class="control-label">{{ 'Group' }}</label>
    <input class="form-control" name="group" type="text" id="group" value="{{ $mersad->group or ''}}" >
    {!! $errors->first('group', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
