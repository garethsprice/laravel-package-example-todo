<h1>{{ Config::get('todo::settings.title') }}</h1>

<ul>
  @if(count($items) == 0)
      <li>No items yet!</li>
  @else
    @foreach($items as $index => $item)
      <li>{{{ $item }}} {{ link_to('todo/delete/' . $index, 'Delete') }}</li>
    @endforeach
  @endif
</ul>

{{ Form::open(array('url' => 'todo/add')) }}
  {{ Form::label('item', 'New Item: ') }}
  <br/>
  {{ Form::text('item') }}
  <br/>
  {{ Form::submit('Add') }}
{{ Form::close() }}