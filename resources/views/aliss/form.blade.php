<div class="form-group {{ $errors->has('ali') ? 'has-error' : ''}}">
    <label for="ali" class="control-label">{{ 'Ali' }}</label>
    <input class="form-control" name="ali" type="text" id="ali" value="{{ $aliss->ali or ''}}" >
    {!! $errors->first('ali', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
