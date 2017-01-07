@extends('layouts.admin')

@section('content')

  <h1>Comments</h1>

@if(count($comments)> 0)
  <table class="table">
  <thead>
    <tr>
      <th>Comment id</th>
      <th>Post id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Created</th>
      <th>Status</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($comments as $comment)
    <tr>
      <td>{{$comment->id}}</td>
      <td>{{$comment->post_id}}</td>
      <td>{{$comment->author}}</td>
      <td>{{$comment->body}}</td>
      <td>{{$comment->created_at}}</td>
      <td>
        @if($comment->is_active == 1)

          {!!Form::open(['method'=>'PATCH', 'action'=>['ServerCommentsController@update', $comment->id]])!!}
            <input type="hidden" name="is_active" value="0">
          	<div class="form-group">
          		{!!Form::submit('Un-approve', ['class'=>'btn btn-danger'])!!}
          	</div>
          {!!Form::close()!!}
        @else
          {!!Form::open(['method'=>'PATCH', 'action'=>['ServerCommentsController@update', $comment->id]])!!}
            <input type="hidden" name="is_active" value="1">
          	<div class="form-group">
          		{!!Form::submit('Approve', ['class'=>'btn btn-primary'])!!}
          	</div>
          {!!Form::close()!!}
        @endif
      </td>
      <td>
        {!!Form::open(['method'=>'DELETE', 'action'=>['ServerCommentsController@destroy', $comment->id]])!!}
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
    <h3 class="text-center">No comments</h3>
  @endif

@endsection
