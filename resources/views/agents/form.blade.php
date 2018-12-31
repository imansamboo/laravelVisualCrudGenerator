<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <select name="name" class="form-control" id="name" >
    @foreach (json_decode('{"ali":"Ali" ,"mohammad":"Mohammad" ,"javad":"Javad"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($agent->name) && $agent->name == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('semat') ? 'has-error' : ''}}">
    <label for="semat" class="control-label">{{ 'Semat' }}</label>
    <select name="semat" class="form-control" id="semat" >
    @foreach (json_decode('{"fooroosh":"Fooroosh" ,"poshtibani":"Poshtibani"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($agent->semat) && $agent->semat == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('semat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('number') ? 'has-error' : ''}}">
    <label for="number" class="control-label">{{ 'Number' }}</label>
    <input class="form-control" name="number" type="text" id="number" value="{{ $agent->number or ''}}" >
    {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
