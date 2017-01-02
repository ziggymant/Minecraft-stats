@extends('layouts.home')

@section('content')
		<div class="row" style="margin:15px 0;">
			<h1>MCServerStatus</h1>
			<p>This is a basic implementation of reading Minecraft server meta and online/offline status.</p>
		</div>
		<div class="row">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th class="status">Status</th>
						<th class="motd">Server</th>
						<th>Players</th>
						<th>Stats</th>
						<th>IMG</th>
					</tr>
				</thead>
				<tbody>
					@foreach($servers as $server)
					<?php $stats = MinecraftServerStatus::query($server, 25565); ?>
					<tr>
						<td>
							@if($stats['players'] > 0)
								<span class="btn btn-success">Online</span>
							@else
								<span class="btn btn-danger">Offline</span>n>
							@endif
						</td>
						<td class="motd"><p> <?php echo $stats['description']; ?> </p> <code><?php echo $server; ?></code></td>
						<td><?php printf('%u/%u', $stats['players'], $stats['max_players']); ?></td>
						<td>{{$stats['version']}}</td>
						<td><?php echo "<img width=\"70 height=\"64\" src=\"" . $stats['favicon'] . "\" />"  ?></td>
						
					</tr>

					<?php unset($stats); ?>
					@endforeach
				</tbody>
			</table>
		</div>
@endsection
