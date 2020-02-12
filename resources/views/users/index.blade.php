@extends('layouts.default')
@section('title', '所有用户')

@section('content')
<div class="col-md-8">
  <h2 class="mb-4 text-center">All Members</h2>

  <table class="table table-hover">
    <thead>
      <tr>
        <th class="col">Firstname</th>
        <th class="col">Lastname</th>
        <th class="col">Email</th>
        <th class="col">Telefon</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($users as $user)
      <tr>
        <td class="col">{{ $user->name }} </td>
         <td class="col">lastname </td>
        <td class="col">

        <a href="#">
          {{ $user->email }}
        </a>
        </td>
        <td class="col">123</td>
       </tr>
      @endforeach
    </tbody>
</table>

</div>
@stop

@section('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@stop
