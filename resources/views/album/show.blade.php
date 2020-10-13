@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Artista)])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Administración de artistas</h4>
            </div>
            {{--<div class="card-body">--}}
              {{--@if ($errors->any())--}}
                {{--<div class="alert alert-danger">--}}
                  {{--<strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
                  {{--<ul>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                      {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                  {{--</ul>--}}
                {{--</div>--}}
              {{--@endif--}}
                {{--<div class="row">--}}
                  {{--<div class="col-lg-12 margin-tb">--}}
                    {{--<div class="pull-left">--}}
                      {{--<h2>  {{ $artista->nombre}}</h2>--}}
                    {{--</div>--}}
                    {{--<div class="pull-right">--}}
                      {{--<a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}
                {{--<div class="row">--}}
                  {{--<div class="col-xs-12 col-sm-12 col-md-12">--}}
                    {{--<div class="form-group">--}}
                      {{--<strong>Name:</strong>--}}
                      {{--{{ $artista->nombre }}--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection