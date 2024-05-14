@extends('layouts.app')
@section('title', 'detalles producto')
@section('content')

<a class="btn btn-success my-4" href="{{ url('/products')}}">Go back</a>

<div class="card mt-4">
    <div class="card-dialog">
        <div class="card-content">
            <div class="card-header">
                <h4>Datos del producto</h4>
            </div>
            <div class="card-body">
                <div class="mb3">
                    Nombre: {{$desiredProduct->name}}
                </div>
                <div class="mb3">
                    Model: {{$desiredProduct->model}}
                </div>
                <div class="mb3">
                    Description: {{$desiredProduct->description}}
                </div>

            </div>


        </div>
    </div>
</div>
@endsection