<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $admin->name or ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <label for="mobile" class="control-label">{{ 'Mobile' }}</label>
    <select name="mobile" class="form-control" id="mobile" >
    @foreach (json_decode('{"09120621785":"09120621785" ,"09019944907":"09019944907"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($admin->mobile) && $admin->mobile == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="control-label">{{ 'Age' }}</label>
    <select name="age" class="form-control" id="age" >
    @foreach (json_decode('{"20":"20" ,"21":"21" ,"22":"22" ,"23":"23"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($admin->age) && $admin->age == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
