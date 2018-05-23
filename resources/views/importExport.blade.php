@extends('template')

@section('contenu')

<nav class="navbar navbar-default">

    <div class="container-fluid">

        <div class="navbar-header">

            <a class="navbar-brand" href="#">Import - Export in Excel and CSV Laravel 5</a>

        </div>

    </div>

</nav>

<div class="container">

    <a href="{{ URL::to('downloadExcel/xls') }}">
        <button class="btn btn-success">Download Excel xls</button>
    </a>

    <a href="{{ URL::to('downloadExcel/xlsx') }}">
        <button class="btn btn-success">Download Excel xlsx</button>
    </a>

    <a href="{{ URL::to('downloadExcel/csv') }}">
        <button class="btn btn-success">Download CSV</button>
    </a>
    {!! Form::open(['url' => 'importExport', 'files' => true]) !!}
        <input type="file" name="import_file"/>
    {!! Form::submit('Envoyer !',['class'=> 'btn btn-info pull-right']) !!}
    {!! Form::close() !!}
</div>

@endsection
