@extends('layouts.admin.master')


@section('content')

    <dashboard-component :useraccess="{{$useraccess}}" :writeraccess="{{$writeraccess}}"></dashboard-component>

@stop