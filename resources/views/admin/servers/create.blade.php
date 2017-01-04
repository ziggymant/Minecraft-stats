@extends('layouts.admin')

@section('content')

<h1>Add server</h1>

{{-- @include('includes.errors') --}}

{!!Form::open(['method'=>'POST', 'action'=>'AdminServersController@store', 'files'=>true])!!}

  <div class="form-group">
  {!!Form::label('address', 'Address')!!}
  {!!Form::text('address', null, ['class'=>'form-control'])!!}
  </div>

  <div class="form-group">
  {!!Form::label('port', 'Port (default port: 25565)')!!}
  {!!Form::text('port', 25565, ['class'=>'form-control'])!!}
  </div>

  <div class="form-group">
  {!!Form::label('banner_url', 'Banner URL')!!}
  {!!Form::text('banner_url', "", ['class'=>'form-control'])!!}
  </div>

  <div class="form-group">
  {!!Form::label('description', 'Description')!!}
  {!!Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3])!!}
  </div>

  {{-- <div class="form-group">
  {!!Form::label('photo_id', 'Photo')!!}
  {!!Form::file('photo_id', ['class'=>'form-control'])!!}
  </div> --}}


  <div class="form-group">
{!!Form::submit('Add server', ['class'=>'btn btn-primary'])!!}
</div>

{!!Form::close()!!}

@endsection
