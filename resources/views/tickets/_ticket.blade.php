<li class="media mt-4 mb-4">
  <a href="{{ route('users.show', $user->id )}}">
    <!-- <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="mr-3 gravatar"/> -->
  </a>
  <div class="media-body">
    <h5 class="mt-0 mb-1">{{ $user->name }} <small> / {{ $ticket->created_at }}</small></h5>
    {{ $ticket->content }}
  </div>
  
</li>