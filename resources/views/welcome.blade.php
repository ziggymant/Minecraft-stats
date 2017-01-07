@extends('layouts.mc')

@section('content')
<div class="row">
  <div class="col-md-9">
  @if(Session::has('message'))
    <p class="text-success text-center bg-primary">{{Session('message')}}</p>
  @endif
  <table  class="table col-md-9">
      <thead>
          <tr class="bg-success">
              <th>LOGO</th>
              <th class="status">Status</th>
              <th class="motd">Server</th>
              <th>MOTD</th>
              <th>Players</th>
              <th>Stats</th>
              <th>Vote</th>
              <th>Votes</th>
          </tr>
      </thead>
      <tbody>
          @foreach($servers as $server)

            <?php $stats = MinecraftServerStatus::query($server['address'], 25565); ?>
            @if($stats['max_players'] >= 0)
              <tr class="bg-primary">
                  <td class="text-center">
                    <a href="{{url('server', $server->id)}}">
                        <?php echo "<img width=\"70 height=\"64\" src=\"" . $stats['favicon'] . "\" />"  ?>
                    </a> <br>
                    <strong>#{{$server->rank}}</strong>
                  <td>
                      @if($stats['max_players'] > 0)
                          <span class="btn btn-success">Online</span>
                      @else
                          <span class="btn btn-danger">Offline</span>
                      @endif
                  </td>
                  <td><code><?php echo $server['address']; ?></code></td>
                  <td>
                    @if($stats['motd'])
                      <p> {{$stats['motd']}} </p>
                    @endif
                  </td>
                  <td><?php printf('%u/%u', $stats['players'], $stats['max_players']); ?></td>
                  <td>{{$stats['version']}}</td>
                  <td>
                  <div class="btn btn-default btn-sm">
                      <a href="{{url('/vote',$server['id'] )}}"><span class="glyphicon glyphicon-thumbs-up"></span> Vote</a>
                  </div>
                  </td>
                  <td>Votes:{{$server->votes}}</td>
              </tr>
            @else
              {{-- If server off its not displayed --}}
            @endif

            <?php unset($stats); ?>
          @endforeach
      </tbody>
  </table>

</div> {{-- end row 1 --}}

<div class="col-md-3">
  <div class="panel panel-success">
    <div class="panel-heading">Latest News</div>
    <div class="panel-body">
      <p>Survival: <span class="label label-success pull-right">Online</span></p>
      <hr />
      <p>Prison: <span class="label label-success pull-right">Online</span></p>
      <hr />
      <p>Factions: <span class="label label-danger pull-right">Offline</span></p>
    </div>
  </div>
</div>

<div class="col-md-3 pull-right">
  <div class="panel panel-success">
    <div class="panel-heading">Latest Comments</div>
    <div class="panel-body">

          @foreach($comments as $comment)
          <div class="item-active quotes">
              <div class="col-sm-12">
                <a href="{{url('server', $comment->server->id)}}"><strong>{{$comment->server->address}} </strong>&ldquo;{{$comment->body}}&rdquo;<strong> - {{$comment->author}}</strong> </a>
              </div>
          </div>
          <hr>
        @endforeach

    </div>

    </div>
  </div>
</div> {{-- end comments panel --}}



<div class="row">
  <div class="col-sm-6 col-sm-offset-5">
      {{$servers->render()}}
  </div>
</div>



@endsection
