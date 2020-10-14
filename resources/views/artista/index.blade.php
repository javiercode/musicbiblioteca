@extends('layouts.app', ['activePage' => 'cancion', 'titlePage' => __('Administración de Artista')])

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
                    <a class="nav-link text-white" href="{{ route('artista.create') }}" title="Adicionar">
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
                  <th>Fecha Creación</th>
                  <th width="280px">Acciones</th>
                  </thead>
                  <tbody>
                  @foreach ($artistaList as $artista)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $artista->nombre }}</td>
                      <td>{{ date_format($artista->created_at, 'jS M Y') }}</td>
                      <td>
                        <form action="{{ route('artista.destroy',  $artista->id) }}" method="POST">
                          <a href="{{ route('artista.edit', $artista) }}">
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
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif



  {!! $artistaList->links() !!}
@endsection
