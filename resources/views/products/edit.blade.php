
@extends('layouts.app')
@section('title', 'Actualizar information')
@section('content')

<h2 class="my-4">Actualizar datos del proveedor</h2>
<!-- takes user back to the index -->
<a class="btn btn-success" href="{{ url('/products')}}">Go back</a>
<!-- url where form makes post request -->
<form class="mt-4 col-5" action="{{ url('/products/' . $desiredProduct->id.  '/update')}}" method="post">
   @csrf
   @method('PUT')
   <div class="mb-3">
   <label class="from-label">Id</label>
    <input class="form-control" type="text" value="{{ $desiredProduct->id }}" disabled >
   </div>
   <div class="mb-3">
   <label class="from-label">Nombre</label>
    <input class="form-control" type="text" name="name" value="{{ $desiredProduct->name }}" >
   </div>
   <div class="mb-3">
   <label class="from-label">Modelo</label>
    <input class="form-control" type="text" name="model" value="{{ $desiredProduct->model }}" >
   </div>
   <div class="mb-3">
   <label class="from-label">Descripción</label>
    <input class="form-control" type="text" name="description" value="{{ $desiredProduct->description }}" > 
   </div>
   <!-- link that point back to the index in case user wants to cancel the operation -->
   <a class="btn btn-primary" href="{{ url('/products')}}">cancelar</a>
   <!-- button to sudmit the form data -->
   <button class="btn btn-secondary" type="sudmit">Editar</button>
</form>
@endsection

<!--
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 -->

