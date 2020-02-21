@extends('layouts.default')
@section('title', 'Tickets Overview')

@section('content')



  @include('users._initial_css_js')
  @include('users._daterangepicker')
  @include('users._ticketsCharts')

@stop
