@extends('layouts.app')

@section('content')

<a class="btn btn-success my-4" href="{{ url('/providers')}}">Go back</a>

<div class="card mt-4">
    <div class="card-dialog">
        <div class="card-content">
            <div class="card-header">
                <h4>Detalles del proveedor</h4>
            </div>
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


        </div>
    </div>
</div>
@endsection