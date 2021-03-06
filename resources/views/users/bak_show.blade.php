
  <!-- {{var_dump((json_decode($tickets)))}} -->
@extends('layouts.default')
@section('title', $user->name)

@section('content')

<div class="row">
  <div class="offset-md-2 col-md-8">
    <section class="user_info">
      @include('shared._user_info', ['user' => $user])
    </section>
    <section class="status">
     @if ($tickets->count() > 0)
        <ul class="list-unstyled">
          @foreach ($tickets as $ticket)
            @include('tickets._ticket')
          }
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
{{ $tickets }}

@stop