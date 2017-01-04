@extends('layouts.mc')

@section('content')

  <table id="table-vertical" class="table ">
      <thead >
          <tr>
              <td>LOGO</td>
              <td><img width="70" height="64" src="{{$stats['favicon']}}"/></td>
          </tr>
          <tr>
              <td>Status</td>
              <td>
                @if($stats['max_players'] > 0)
                    <span class="btn btn-success">Online</span>
                @else
                    <span class="btn btn-danger">Offline</span>
                @endif
              </td>
          </tr>
              <td>Server</td>
              <td><code><?php echo $server['address']; ?></code></td>
          </tr>
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
              <td>Stats</td>
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
          <tr>
              <td>Votes</td>
              <td>Votes:{{$server->votes}}</td>
          </tr>
      </thead>
  </table>

@endsection
