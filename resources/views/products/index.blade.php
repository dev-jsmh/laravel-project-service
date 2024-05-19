<!-- 
view to show a list of all products
-->
@extends('layouts.app')
@section('title', 'productos')
@section('content')
<!-- button for add information of new providers -->
<a class="btn btn-success my-3" href="{{ url('/products/create')}}">Crear</a>
<h4 class="mb-3">Productos</h4>
<!-- change the list view for a grid view so products are more organized -->
<div class="row">
@foreach($products as $product)
<!-- added some width and margin style to product cards -->
<div class="card col-sm-12 col-md-5 col-lg-3" style="margin: 0.3rem 1.5rem;">
    <div class="card-dialog">
        <div class="card-content">
            <div class="card-body">
            <div class="mb3">
                    Id: {{$product->id}}
                </div>
                <div class="mb3">
                    Nombre: {{$product->name}}
                </div>
                <div class="mb3">
                    Modelo: {{$product->model}}
                </div>
                <div class="mb3">
                    Descripción: {{$product->description}}
                </div>
            </div>
            <div class="card-footer">
                <h5>Acciones</h5>
                <div class="mb-3 d-flex">
                    <!-- use a form here to delete a product using the get method just in order to triger the endpoint -->
                    <form class="m-2" action="{{ url('/products/' . $product->id . '/delete') }}" method="GET">
                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                    </form>
                    <!-- link to view details of the product -->
                    <a class="btn btn-info m-2" href="{{ url('/products/' . $product->id . '/details') }}"><i class="bi bi-eye"></i></a>
                    <!-- link to a view that contains a form to edit product information -->
                    <a class="btn btn-warning m-2" href="{{ url('/products/' . $product->id . '/edit') }}"><i class="bi bi-pencil"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection
<!-- 
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 view to show a list of all resources of products
-->