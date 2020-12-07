@extends('layouts.admin')

@section('admin')
<div class="main mb-4">
    @include('layouts.nav')
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    <i class="fas fa-cog"></i> Configuraciones
                </h1>
                <p class="header-subtitle">Estas configuraciones serán visibles en la tienda para los usuarios!.</p>
            </div>

            @if(Session::has('success'))
                <div class="alert alert-info alert-outline alert-dismissible" role="alert">
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        {{Session::get('success')}}
                    </div>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(Session::has('danger'))
                <div class="alert alert-danger alert-outline alert-dismissible" role="alert">
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        {{Session::get('danger')}}
                    </div>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <form action="{{route('config_save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="row">
                    <div class="col-lg-12 col-md-12 form-group">
                        <div class="card" style="background: #e8e8e8 !important">
                            <div class="card-header">
                                <h5 class="card-title">General</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <label><b>Nombre de la tienda</b></label>
                                        <input type="text" required class="form-control" name="titulo" placeholder="Nombre general del ecommerce" value="">
                                        @if ($errors->has('titulo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('titulo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label><b>Correo de contacto</b></label>
                                        <input type="email" required class="form-control" name="correo" placeholder="Ingrese correo de contacto" value="">
                                        @if ($errors->has('correo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('correo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title">Listado de productos</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::open(array('url'=>'admin/productos','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" type="text" placeholder="Buscar producto" name="buscar" value="">
                                    <div class="input-group-addon">
                                      <button class="btn btn-info"><i class="fas fa-search"></i></button>
                                      <a href="{{route('index.producto')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i></a>
                                    </div>
                                </div>
                                {{Form::close()}}
                            </div>
                            <div class="col-lg-2">
                                <div class="btn-group">
                                    <button type="button" class="btn mb-1 btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Optiones
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                        <a class="dropdown-item" href=""><i class="fas fa-archive"></i> Registrar producto</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>rate</th>
                                <th>Ciudad</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        @foreach ($tecnicos as $item)
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{asset('poster/'.$item->foto)}}" width="48" height="48" class=" mr-2" alt="Avatar"> {{$item->user->name}} {{$item->user->fullname}}
                                </td>
                                <td><b>Rate</b> {{$item->rate}}</td>
                                <td>{{$item->ciudad}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn mb-1 btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href=""><i class="fas fa-edit"></i> Editar detalles</a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#stock-"><i class="fas fa-socks"></i> Aumentar stock</a>
                                            <a class="dropdown-item" href=""><i class="fas fa-images"></i> Galería</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal-">Eliminar producto</a>
                                        </div>
                                    </div>
                                   {{--  @include('admin.producto.modal') --}}
                                    {{-- Stock --}}
                                    <div class="modal fade" id="stock-" tabindex="-1" role="dialog" aria-modal="true" style="padding-right: 16px; display: none;">
                                        <form action="" method="POST" role="form">
                                            @csrf
                                            <input name="_method" type="hidden" value="PATCH">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Aumentar stock</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body m-3">
                                                        <p class="mb-4"><b>Producto: </b>, <b>Stock actual: </b>u.</p>
                                                        <input type="number" class="form-control" placeholder="Cantidad para aumento" name="stock">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cerrar</button>
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Aumentar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- Stock --}}
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-12 col-xl-12">
            </div>
        </div>
    </main>
</div>
@endsection
