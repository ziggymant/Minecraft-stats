@extends('layouts.admin')


@section('content')

  <h1>Servers</h1>

  <a class="btn btn-success" href="{{route('servers.create')}}">Add server</a>

  <table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Server address</th>
      <th>Description</th>
      <th>User</th>
      <th>Banner url</th>
      <th>Update</th>
      <th>Created at</th>
    </tr>
  </thead>
  @if($servers)
    @foreach($servers as $server)
      <tbody>
        <tr>
          <td>{{$server->id}}</td>
          <td>{{$server->address}}</td>
          <td>{{$server->description}}</td>
          <td>{{$server->user_id}}</td>
          <td>Banner</td>
          <td><a class="btn btn-success" href="{{route('servers.edit', $server)}}">Edit entry</a></td>
          <td>{{$server->created_at}}</td>
        </tr>
      </tbody>
    @endforeach
  @endif
</table>

@endsection
