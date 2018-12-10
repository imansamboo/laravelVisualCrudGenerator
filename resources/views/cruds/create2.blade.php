@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>New Crud</h3>
                {!! Form::open(/*['route' => 'cruds.store']*/)!!}
                <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
                <input type="text" id="number" name="number" value="">Number of Fields: <br />
                <a href="#" id="filldetails" onclick="addFields()">Fill Details</a>
                <div id="options-will-fill"></div>

                {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script type='text/javascript'>
        function addFields(){
            // Number of inputs to create
            var number = document.getElementById("number").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("options-will-fill");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            console.log(number);
            for (i=1;i-1 < number;i++){
                container.innerHTML += '<div class="form-group "> <label for="field_name' +
                        i + '">Field Name ' +
                        i + '</label> <input class="form-control" name="field_name' +
                        i + '" type="text" id="field_name' +
                        i + '"> </div>' +
                        '<div class="form-group "> <label for="fieldType' +
                        i + '">Field Type ' +
                        i + '</label> <select id="fieldType' +
                        i + '" name="fieldType' +
                        i + '"><option value="string" selected="selected">string</option><option value="integer">integer</option><option value="integer unsigned">integer unsigned</option><option value="enum">enum</option></select> </div><div class="form-group "> <label for="options' +
                        i + '">Options' +
                        i + '</label><input class="form-control" name="options' +
                        i + '" type="text" id="options' +
                        i + '"></div>';
            }
        }
    </script>
@endsection