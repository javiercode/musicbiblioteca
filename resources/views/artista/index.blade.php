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

                          {{--<a href="{{ route('artista.show', $artista->id) }}" title="show">--}}
                            {{--<i class="material-icons">visibility</i> </a>--}}
                          {{--</a>--}}

                          <a href="{{ route('artista.edit', $artista) }}">
                            <i class="material-icons">create</i> </a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="material-icons">delete</i>
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
        <!--<h2>artistaes</h2>-->
      </div>
      <div class="pull-right">
        <br>
        <br>
        <br>
        <br>
        <a class="btn btn-success" href="{{ route('artista.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
        </a>
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
