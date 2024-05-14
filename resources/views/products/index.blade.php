<!-- 

view to show a list of all products

-->


@extends('layouts.app')
@section('title', 'productos')
@section('content')

<!-- button for add information of new providers -->
<a class="btn btn-success my-3"  href="{{ url('/products/create')}}">Crear</a>

<h4 class="mb-3">Productos</h4>

@foreach($products as $product)

<div class="card">
    <div class="card-dialog">
        <div class="card-content">
            <div class="card-body">
                <div class="mb3">
                    Nombre: {{$product->name}}
                </div>
                <div class="mb3">
                    Teléfono: {{$product->model}}
                </div>
                <div class="mb3">
                    Dirrección: {{$product->description}}
                </div>
            
            </div>
            <div class="card-footer">
                <h5>Acciones</h5>
            <div class="mb3">
                    <a class="btn btn-danger" ><i class="bi bi-trash" ></i></a>
                    <a class="btn btn-info" href="{{ url('/products/' . $product->id . '/details') }}"><i class="bi bi-eye"></i></a>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection