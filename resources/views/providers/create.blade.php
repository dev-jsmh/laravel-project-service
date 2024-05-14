@extends('layouts.app')

@section('title', 'Añadir proveedor')



@section('content')

<h2 class="my-4">Añadir información de nuevo proveedor</h2>
<a class="btn btn-success" href="{{ url('/providers')}}">Go back</a>

<form class="mt-4" action="{{ url('/providers/store')}}" method="post">
   @csrf
   <div class="mb-3">
   <label class="from-label">Nombre</label>
    <input class="form-control" type="text">
   </div>
   <div class="mb-3">
   <label class="from-label">Teléfono</label>
    <input class="form-control" type="text">
   </div>
   <div class="mb-3">
   <label class="from-label">Dirección</label>
    <input class="form-control" type="text">
   </div>
   <a class="btn btn-primary" href="{{ url('/providers')}}">cancelar</a>
   <button class="btn btn-secondary" type="sudmit">crear</button>
</form>
@endsection