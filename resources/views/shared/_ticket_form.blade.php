<form action="{{ route('tickets.store') }}" method="POST">
  @include('shared._errors')
  {{ csrf_field() }}
  <textarea class="form-control" rows="3" placeholder="聊聊新任务..." name="content">{{ old('content') }}</textarea>
  <textarea class="form-control" rows="1" placeholder="优先级..." name="prio">{{ old('prio') }}</textarea>
  <textarea class="form-control" rows="1" placeholder="完成状态..." name="status">{{ old('status') }}</textarea>
  <div class="text-right">
      <button type="submit" class="btn btn-primary mt-3">存储</button>
  </div>
</form>