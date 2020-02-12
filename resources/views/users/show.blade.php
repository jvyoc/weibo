@extends('layouts.default')
@section('title', 'Tickets Overview')

@section('content')
@include('users._initial_css_js')
  <!-- Single User Tickets -->
  <!-- @include('users._SingleUserTicketsCharts',['user' => $user]) -->
 @include('users._daterangepicker')

 <!-- All tickets -->
  @include('users._ticketsCharts')

 <div class="row">
  <div class="offset-md-2 col-md-8">
    <section class="user_info">
      @include('shared._user_info', ['user' => $user])
    </section>
    <section class="ticket">
      @if ($tickets->count() > 0)
        <ul class="list-unstyled">
          @foreach ($tickets as $ticket)
            @include('tickets._ticket')
          @endforeach
        </ul>
        <div class="mt-5">
          {!! $tickets->render() !!}
        </div>
      @else
        <p>没有数据！</p>
      @endif
    </section>
  </div>
</div>
@stop
