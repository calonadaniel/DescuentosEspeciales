

@extends('components.template')
@section('content')


@if (Auth::user()->can('acces-index'))

<div class="section">
    <div class="container">
        @include('components.searchbar',['placeholder'=> "Buscar Producto..."])
        <div class="row d-flex justify-content-start">
            <i href="#"class="fas fa-plus fa-2x mb-2 ml-3 " data-toggle="modal" data-target="#Modal-add"></i>
        </div>
        <table class="table table-hover table-sm table-bordered" id="myTable" >
        <thead class="">
            <tr class="text-center">
            <th class="text-center" scope="col">#</th>
            <th class="text-left"scope="col">Itemlookupcode</th>
            <th scope="col">Descripción</th>
            <th class="text-center" scope="col">Tipo Desc</th>
            <th class="text-center" scope="col">Descuento</th>
            <th class="text-center" scope="col">Fecha Inicio</th>
            <th class="text-center" scope="col">Fecha Fin</th>
           {{-- <th class="text-center" scope="col">Requisitos</th>--}}
            <th class="text-center" scope="col">Acciones</th>
            </tr>
        </thead>  
        <tbody>
            @php
                $num = 1;
            @endphp
            @foreach($listaProductos as $producto) 
            <tr>
            <th class="text-center"scope="row">{{$num++}}</th>
            <td class="text-left">{{$producto->itemlookupcode}}</td>
            <td class="text-left">{{$producto->description}}</td>
            <td class="text-center">{{$producto->tipoDesc}}</td>
            <td class="text-center">{{number_format((float)$producto->descuento, 2, '.', '')}}%</td>
            <td class="text-center">{{date('d/m/Y', strtotime($producto->fechaInicia))}}</td>
            <td class="text-center">{{date('d/m/Y', strtotime($producto->fechaFinaliza))}}</td>
            {{--<td class="text-left">{{$producto->requisitos}}</td>--}}

            <td class="text-center">

                {{--Ver informacion del expediente
                <i
                href="#"  
                class="fas fa-eye"                     
                data-toggle="modal" 
                data-target="#Modal-show" 
                @include('components.producto.productodata',['producto' => $producto])
                ></i>--}}

                {{--Editar informacion del producto--}}
                <i 
                href="#"
                class="far fa-edit"
                data-toggle="modal" 
                data-target="#Modal-edit"
                @include('components.producto.productodata',['producto' => $producto])
                ></i>

                {{--Borrar el producto--}}
                <i href="#"  
                class="fas fa-trash-alt" 
                data-toggle="modal" 
                data-target="#Modal-delete"
                data-itemlookupcode="{{$producto->itemlookupcode}}"
                ></i>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>

        <div class="d-flex justify-content-center bg-white">
            {!! $listaProductos->links() !!}
        </div>
    </div>
</div>
    <!-- Modal para agregar un nuevo descuento -->
    <div class="modal fade left" id="Modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Descuento Especial</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @php
                $action ="add";
                @endphp
                <form action="{{route('producto.store')}}" id="productoform-{{$action}}" method="post">
                @csrf
                   @include('components.producto.productoform',['action' => $action])
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                        <button type="submit" class=" btn btn-guardar ">Guardar Descuento</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

        <!-- Modal para editar/actualizar un descuento existente-->
        <div class="modal fade left" id="Modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Descuento Especial</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @php
                $action ="edit";
                @endphp
                <form action="{{route('producto.update', 'edit_itemlookupcode')}}" id="productoform-{{$action}}" method="POST">
                   @csrf
                   @method('PUT')
                   @include('components.producto.productoform',['action' => $action])
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                        <button type="submit" class=" btn btn-guardar ">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>



        <!-- Modal para borrar un producto-->
        <div class="modal fade left" id="Modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Borrar Descuento Especial</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('producto.destroy','delete_itemlookupcode')}}" method="post">
                @csrf
                @method('DELETE')
                    <div>
                        @php
                        $action = "delete";
                        @endphp
                        <input type="hidden" id="delete_itemlookupcode" name="delete_itemlookupcode">
                        <p>¿Esta seguro que desea borrar el descuento especial?</p>
                        <p> Todos los datos asociados a este descuento seran eliminados.</p>
                        <p class="font-weight-bold text-black">Esta operación no puede deshacerse.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" disabled>Cancelar</button>
                        <button type="submit" class="btn btn-borrar">Borrar</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div> 

@else

@php

return (Session::flush());
return redirect('/');

@endphp

@endif


@endsection

