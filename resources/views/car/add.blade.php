@extends('layouts.app')

@section('content')
    <div class="text-center" style="margin-top: 25px">
        <h3>New Car</h3>
        {!! Form::open(['route' => 'addCars', 'method' => 'post', 'class' => 'text-center', 'style' => 'margin-right:36px']) !!}
        {!! Form::label('model', 'Car model') !!}
        {!! Form::text('model') !!}
        {!! Form::label('number', 'Car number') !!}
        {!! Form::text('number') !!}
        {!! Form::submit('OK') !!}
        {!! Form::close() !!}
    </div>
@stop

