@extends('layouts.admin')

@section('content')

  <h1>Comments</h1>

  @if (Session::has('message'))
    <p class="text-success">{{Session('message')}}</p>
  @endif

  <table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Body</th>
      <th>Created at</th>
      <th>Post</th>
      <th>Replies</th>
      <th>Active</th>
      <th>Delete</th>
    </tr>
  </thead>
@if(count($comments)> 0)
  <tbody>
    @foreach($comments as $comment)
    <tr>
      <td>{{$comment->id}}</td>
      <td>{{$comment->author}}</td>
      <td>{{$comment->body}}</td>
      <td>{{$comment->created_at}}</td>
      <td><a href="{{route('home.post', $comment->post_id)}}">View post: {{$comment->post->title}}</a></td>
      <td><a href="{{route('replies.show', $comment->id)}}">View replies</a></td>
      <td>
        @if($comment->is_active == 1)

          {!!Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]])!!}
            <input type="hidden" name="is_active" value="0">
          	<div class="form-group">
          		{!!Form::submit('Un-approve', ['class'=>'btn btn-danger'])!!}
          	</div>
          {!!Form::close()!!}
        @else
          {!!Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]])!!}
            <input type="hidden" name="is_active" value="1">
          	<div class="form-group">
          		{!!Form::submit('Approve', ['class'=>'btn btn-primary'])!!}
          	</div>
          {!!Form::close()!!}
        @endif
      </td>
      <td>
        {!!Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]])!!}
          <div class="form-group">
            {!!Form::submit('Delete', ['class'=>'btn btn-danger'])!!}
          </div>
        {!!Form::close()!!}

      </td>
    </tr>
  @endforeach
  </tbody>
@endif
</table>

@endsection
