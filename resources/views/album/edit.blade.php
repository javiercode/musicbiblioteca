@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Album')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Editar Album</h4>
              <div class="row">
                <div class="col-lg-12 margin-tb">
                  <div class="pull-right">
                    <a class="nav-link text-white" href="{{ route('cancion.create') }}" title="Adicionar">
                      <i class="material-icons">add_box</i> </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
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

                <div class="row">
                  <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                      <a class="btn btn-primary" href="{{ route('artista.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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

                <form action="{{ route('album.update', $album->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="nombre" value="{{ $album->nombre }}" class="form-control" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <strong>Año Lanzamiento:</strong>
                        <input type="text" name="gestionLanzamiento" value="{{ $album->gestionLanzamiento }}" class="form-control" placeholder="Año">
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <strong>Artista:</strong>
                        <select name="idArtista" id="" class="form-control">
                          @foreach ($artistaList as $artista)
                            <option value="{{$artista['id']}}" {{$artista['id']==$album->idArtista ? 'SELECTED': ''}}>{{$artista['nombre']}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection