@if ($feed_items->count() > 0)
  <ul class="list-unstyled">
    @foreach ($feed_items as $ticket)
      @include('tickets._ticket',  ['user' => $ticket->user])
    @endforeach
  </ul>
  <div class="mt-5">
    {!! $feed_items->render() !!}
  </div>
@else
  <p>没有数据！</p>
@endif