@extends('layouts.app', ['activePage' => 'cancion', 'titlePage' => __('Administración de Canciones')])

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
                    <a class="nav-link text-white" href="{{ route('cancion.create') }}" title="Adicionar">
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
                  <th>Reproduccines</th>
                  <th width="280px">Reproducciones</th>
                  <th>Fecha Creación</th>
                  </thead>
                  <tbody>
                  @foreach ($cancionList as $cancion)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $cancion->nombre }}</td>
                      <td>{{ $aAlbum[$cancion->idAlbum]}}</td>
                      <td>{{ $cancion->nroReproducciones}}</td>
                      <td>{{ date_format($cancion->created_at, 'jS M Y') }}</td>
                      <td>
                        <form action="{{ route('cancion.destroy', $cancion->id) }}" method="POST">
                          <a href="{{ route('cancion.edit', $cancion) }}">
                            <i class="material-icons">edit</i> </a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm">
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



  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif



  {!! $cancionList->links() !!}
@endsection
