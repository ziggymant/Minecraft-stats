@extends('layouts.admin')

@section('content')

  <h1>replies</h1>

@if(count($replies)> 0)
  <table class="table">
  <thead>
    <tr>
      <th>Reply id</th>
      <th>Comment id</th>
      <th>Author</th>
      <th>Reply</th>
      <th>Created</th>
      <th>Status</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($replies as $reply)
    <tr>
      <td>{{$reply->id}}</td>
      <td>{{$reply->comment_id}}</td>
      <td>{{$reply->author}}</td>
      <td>{{$reply->body}}</td>
      <td>{{$reply->created_at}}</td>
      <td>
        @if($reply->is_active == 1)

          {!!Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]])!!}
            <input type="hidden" name="is_active" value="0">
          	<div class="form-group">
          		{!!Form::submit('Un-approve', ['class'=>'btn btn-danger'])!!}
          	</div>
          {!!Form::close()!!}
        @else
          {!!Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]])!!}
            <input type="hidden" name="is_active" value="1">
          	<div class="form-group">
          		{!!Form::submit('Approve', ['class'=>'btn btn-primary'])!!}
          	</div>
          {!!Form::close()!!}
        @endif
      </td>
      <td>
        {!!Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]])!!}
          <div class="form-group">
            {!!Form::submit('Delete', ['class'=>'btn btn-danger'])!!}
          </div>
        {!!Form::close()!!}

      </td>
    </tr>
    @endforeach

  </tbody>
  </table>
  @else
    <h3 class="text-center">No replies</h3>
  @endif

@endsection
