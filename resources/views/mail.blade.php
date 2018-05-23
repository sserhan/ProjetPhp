@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">Fiche d'utilisateur</div>
            <div class="panel-body">
                {!! Form::open(['url'=>'user/mail/'.$user->id]) !!}
                <p> c'est l'id {{$user->id}}</p>
                <p> c'est l'email {{$user->email}}</p>
                {!! Form::hidden('id',$user->id) !!}
                <div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('texte', null, ['class' => 'form-control', 'placeholder' => 'Votre message']) !!}
                    {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}
                </div>
            </div>
        </div>

        {!! Form::submit('Envoyer !',['class'=> 'btn btn-info pull-right']) !!}
        {!! Form::close() !!}
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection