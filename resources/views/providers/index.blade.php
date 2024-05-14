<!-- 

 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 
 view to show a list of all resources of products

-->

@extends('layouts.app')
@section('title', 'index')
@section('content')

<!-- button for add information of new providers -->
<a class="btn btn-success my-3"  href="{{ url('/providers/create')}}">Crear</a>

<h2 class="mb-2">Proveedores</h2>

@foreach($providers as $provider)

<div class="card mt-4">
    <div class="card-dialog">
        <div class="card-content">
            <div class="card-body">
                <div class="mb3">
                    Nombre: {{$provider->name}}
                </div>
                <div class="mb3">
                    Teléfono: {{$provider->phone}}
                </div>
                <div class="mb3">
                    Dirrección: {{$provider->address}}
                </div>
            
            </div>
            <div class="card-footer">
                <h5>Acciones</h5>
            <div class="mb3">
                    <a class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    <a class="btn btn-info" href="{{ url('/providers/' . $provider->id . '/details') }}"><i class="bi bi-eye" ></i></a>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection