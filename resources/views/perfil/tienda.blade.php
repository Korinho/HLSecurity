@extends('layouts.users')
@section('user-content')
<main class="main">
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-9 order-lg-last dashboard-content">
                <h2>Mi tienda</h2>
                
                <form action="{{route('editar_tienda')}}" role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="POST">
                    <div class="row">
                        @if(Session::has('success'))
                            <div class="col-sm-11 form-group">
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        @if(Session::has('danger'))
                        <div class="col-sm-11 form-group">
                            <div class="alert alert-danger">
                                {{Session::get('danger')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group required-field">
                                        <label><b>Logo</b></label>
                                        <input id="imgInp1" type="file" class="form-control mb-4" name="logo">
                                        <img id="blah1" src="{{asset('logos/'.$usuario->logoname)}}" style="width:100%">
                                        @if ($errors->has('name'))
                                            <span class="help-block" style="color: #ff0000">{{ $errors->first('logo') }}</span>
                                        @endif
                                    </div><!-- End .form-group -->
                                </div><!-- End .col-md-4 -->
                                <div class="col-md-6">
                                    <div class="form-group required-field">
                                        <label><b>Nombre de la Tienda</b></label>
                                        <input id="imgInp1" type="text" class="form-control mb-4" name="nombre_tienda" value='{{$usuario->nombre_tienda}}'>
                                        @if ($errors->has('nombre_Tienda'))
                                            <span class="help-block" style="color: #ff0000">{{ $errors->first('nombre_tienda') }}</span>
                                        @endif
                                    </div><!-- End .form-group -->
                                </div><!-- End .col-md-4 -->


                                <div class="col-sm-12 mt-4 text-right">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                                
                            </div><!-- End .row -->
                        </div><!-- End .col-sm-11 -->
                    </div><!-- End .row -->
                 
                
                </form>
            </div><!-- End .col-lg-9 -->

            <aside class="sidebar col-lg-3">
                <div class="widget widget-dashboard">
                    <h3 class="widget-title">Cuenta</h3>

                    <ul class="list">
                        <li><a href="{{route('cuenta')}}" style="background-color: #eee;"><i class="icon icon-user"></i> Mi perfíl</a></li>
                        <li><a href="{{route('direccion')}}"><i class="icon icon-post"></i> Direcciones</a></li>
                        <li class='active'><a href="{{route('tienda')}}"><i class="icon icon-post"></i> Mi Tienda</a></li>
                    
                    </ul>
                </div><!-- End .widget -->
            </aside><!-- End .col-lg-3 -->
        </div>
    </div>
</main>

@endsection