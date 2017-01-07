@extends('layouts.mc')

@section('content')

<div class="container">
  <div class="panel">


      <table class="table table-inverse">
        <thead class="thead-inverse">
          <tr>
            <th>Rank</th>
            <th>Server Name</th>
            <th>Description</th>
            <th>Votes</th>
          </tr>
        </thead>
        <tbody>
@if($servers)
  @foreach($servers as $server)
          <tr>
            <th scope="row">#{{$server->rank}}</th>
            <td><a href="{{url('server',$server->id )}}">{{$server->address}}</a></td>
            <td>{{$server->description}}</td>
            <td>{{$server->votes}}</td>
          </tr>
  @endforeach
@endif
        </tbody>
      </table>
    </div>
  </div>


@endsection
