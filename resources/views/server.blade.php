@extends('layouts.mc')

@section('content')

  <table id="table-vertical" class="table ">
      <thead>
        {{-- {{dd($comments)}} --}}
          <tr>
              <td><img width="70" height="64" src="{{$stats['favicon']}}"/></td>
              <td><h3><?php echo $server['address']; ?></h3></td>
          </tr>
          <tr>
              <td><span class="glyphicon glyphicon-stats"> Ranking</span></td>
              <td><strong>#{{$server->rank}}</strong></td>
          </tr>
          <tr>
              <td>Votes</td>
              <td>Votes:{{$server->votes}}</td>
          </tr>
          <tr>
              <td>Status</td>
              <td>
                @if($stats['max_players'] > 0)
                    <span class="glyphicon glyphicon-ok-sign"> Online</span>
                @else
                    <span class="btn btn-danger">Offline</span>
                @endif
              </td>
          <tr>
              <td>MOTD</td>
              <td>
                @if($stats['motd'])
                  <p> {{$stats['motd']}} </p>
                @endif
              </td>
          </tr>
          <tr>
              <td>Players</td>
              <td><?php printf('%u/%u', $stats['players'], $stats['max_players']); ?></td>
          </tr>
          <tr>
              <td><span class="glyphicon glyphicon-info-sign"> Stats</span></td>
              <td>{{$stats['version']}}</td>
          </tr>
          <tr>
              <td>Website</td>
              <td><a href="{{$server->website}}">{{$server->website}}</a></td>
          </tr>
          <tr>
              <td>Vote</td>
                <td>
                <button type="button" class="btn btn-default btn-sm">
                    <a href="{{url('/vote',$server['id'] )}}"><span class="glyphicon glyphicon-thumbs-up"></span> Vote</a>
                </button>
              </td>
          </tr>

      </thead>
  </table>

  <!-- Blog Comments -->
@if(Auth::check())
  <!-- Comments Form -->
  <div class="well">
      <h4>Leave a Comment:</h4>


      {!!Form::open(['method'=>'POST', 'action'=>'ServerCommentsController@store'])!!}

        <input type="hidden" name="server_id" value="{{$server->id}}">
        <div class="form-group">
          {!!Form::label('body', 'Comment')!!}
          {!!Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3])!!}
        </div>

        <div class="form-group">
          {!!Form::submit('Post comment', ['class'=>'btn btn-primary'])!!}
        </div>

      {!!Form::close()!!}


  </div>
@endif

  <!-- Posted Comments -->
@if(isset($comments) && count($comments)>0)
  <!-- Comment -->
  @foreach($comments as $comment)
  <div class="well">
      <a class="pull-left" href="#">
          <img height="64" class="media-object" src="{{url('img/user_default.ico')}}" alt="">
      </a>
      <button class="toggle-reply btn btn-primary pull-right">Reply</button>
      <div class="media-body">
          <h4 class="media-heading">{{$comment->author}}
              <small>{{$comment->created_at->diffForHumans()}}</small>
          </h4>
          {{$comment->body}}

          <div class="comment-reply-container">
              <div class="comment-reply">
                  {!!Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store'])!!}
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    <div class="form-group">
                      {!!Form::label('body', 'Reply')!!}
                      {!!Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1])!!}
                    </div>

                    <div class="form-group">
                      {!!Form::submit('Reply', ['class'=>'btn btn-primary'])!!}
                    </div>
                  {!!Form::close()!!}
              </div> <!-- End comment-reply col-->
          </div> <!-- End comment-reply container-->

          @if(count($comment->replies)>0)
            @foreach($comment->replies as $reply)

              @if($reply->is_active == 1)
                <!-- Nested Comment -->
                <div id="nested-comment" class="media">
                    <a class="pull-left" href="#">
                        <img height="64" class="media-object" src="{{url('img/user_default.ico')}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$reply->author}}
                            <small>{{$reply->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$reply->body}}
                    </div>
                </div> <!-- End Nested Comment -->
              @endif
            @endforeach
          @endif

      </div>
  </div>
  @endforeach

@endif

@endsection

@section('scripts')
  <script type="text/javascript">
    $(".toggle-reply").click(function(){
      $(".comment-reply").slideToggle('slow');

    });
  </script>

@endsection
