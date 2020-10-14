@extends('layouts.app', ['activePage' => 'cancion', 'titlePage' => __('Administración de Album')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Listado</h4>

              <div class="row">
                <div class="col-lg-12 margin-tb">
                  <div class="pull-right">
                    <a class="nav-link text-white" href="{{ route('album.create') }}" title="Adicionar">
                      <i class="material-icons">add_box</i> </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead class="text-primary">
                  <th>Nro</th>
                  <th>Nombre</th>
                  <th>Año de Lanzamiento</th>
                  <th>Artista</th>
                  <th>Fecha Creación</th>
                  <th width="280px">Acciones</th>
                  </thead>
                  <tbody>
                  @foreach ($albumList as $album)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $album->nombre }}</td>
                      <td>{{ $album->gestionLanzamiento }}</td>
                      <td>{{ $aArtista[$album->idArtista] }}</td>
                      <td>{{ date_format($album->created_at, 'jS M Y') }}</td>
                      <td>
                        <form action="{{ route('album.destroy',  $album->id) }}" method="POST">
                          <a href="{{ route('album.edit', $album) }}">
                            <i class="material-icons">edit</i> </a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" rel="tooltip" title="Eliminar"
                                  class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <br><br><br><br><br><br>
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <!--<h2>albumes</h2>-->
      </div>
      <div class="pull-right">
        <br>
        <br>
        <br>
        <br>
        <a class="btn btn-success" href="{{ route('album.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
        </a>
      </div>
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif



  {!! $albumList->links() !!}
@endsection
