@extends('layouts.mc')

@section('content')

<table id="table" class="table">
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
                  </a>
                  <strong>#{{$server->rank}}</strong>
                <td>
                    @if($stats['max_players'] > 0)
                        <span class="btn btn-success">Online</span>
                    @else
                        <span class="btn btn-danger">Offline</span>
                    @endif
                </td>
                <td><code><?php echo $server['address']; ?></code></td>
                <td class="motd">
                  @if($stats['motd'])
                    <p> {{$stats['motd']}} </p>
                  @endif
                </td>
                <td><?php printf('%u/%u', $stats['players'], $stats['max_players']); ?></td>
                <td>{{$stats['version']}}</td>
                <td>
                <button type="button" class="btn btn-default btn-sm">
                    <a href="{{url('/vote',$server['id'] )}}"><span class="glyphicon glyphicon-thumbs-up"></span> Vote</a>
                </button>
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


@endsection
