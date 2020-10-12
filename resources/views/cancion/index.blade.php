@extends('layouts.app', ['activePage' => 'cancion', 'titlePage' => __('Administración de Canciones')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Administración de canciones</h4>


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
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Album</th>
                  <th>Reproduccines</th>
                  <th>Fecha Creación</th>
                  <th width="280px">Acciones</th>
                  </thead>
                  <tbody>
                  @foreach ($cancionList as $cancion)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $cancion->nombre }}</td>
                      <td>{{ $cancion->idAlbum}}</td>
                      <td>{{ $cancion->nroReproducciones}}</td>
                      <td>{{ date_format($cancion->created_at, 'jS M Y') }}</td>
                      <td>
                        <form action="{{ route('cancion.destroy', $cancion->id) }}" method="POST">

                          <a href="{{ route('cancion.show', $cancion->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                          </a>

                          <a href="{{ route('cancion.edit', $cancion->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>
                          </a>

                          @csrf
                          @method('DELETE')

                          <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

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
        <!--<h2>Canciones</h2>-->
      </div>
      <div class="pull-right">
        <br>
        <br>
        <br>
        <br>
        <a class="btn btn-success" href="{{ route('cancion.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
        </a>
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
