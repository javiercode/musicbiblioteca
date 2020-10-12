@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Edit Product</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('cancion.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
      </div>
    </div>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('cancion.update', $cancion->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Name:</strong>
          <input type="text" name="name" value="{{ $cancion->nombre}}" class="form-control" placeholder="Nombre">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Location:</strong>
          <input type="text" name="location" class="form-control" placeholder="{{ $cancion->nroReproducciones }}"
                 value="{{ $cancion->nroReproducciones }}">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Cost:</strong>
          <input type="number" name="cost" class="form-control" placeholder="{{ $cancion->idAlbum }}"
                 value="{{ $cancion->idAlbum }}">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
@endsection