@extends('layouts.app')

@section('content')
    <div class="text-center" style="margin-top: 25px">
        <h3>New Driver</h3>
        {!! Form::open(['route' => 'addDrivers', 'method' => 'post', 'class' => 'text-center', 'style' => 'margin-right:36px']) !!}
        {!! Form::label('driver_name', 'Name') !!}
        {!! Form::text('driver_name') !!}
{{--        тут можно было бы вывести селект из имеющихся в базе машин, я забил, можно просто передавать id машины на форме--}}
        {!! Form::label('car_number', 'Car id in DB') !!}
        {!! Form::text('car_number') !!}
        {!! Form::submit('OK') !!}
        {!! Form::close() !!}
    </div>
@stop

