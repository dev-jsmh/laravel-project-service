
@extends('layouts.app')
@section('title', 'Editar información')
@section('content')

<h2 class="my-4">Editar información de proveedor existente</h2>
<a class="btn btn-success" href="{{ url('/providers')}}">Go back</a>
<!-- view with a form to modify data of an specified Provider -->
<form class="mt-4" action="{{('/providers/' . $desiredProvider->id . '/update')}}" method="post">
   @csrf
   @method('PUT')
   <div class="mb-3">
   <label class="from-label">Nombre</label>
   <!--  Provider's name -->
    <input class="form-control" type="text" name="name" value="{{$desiredProvider->name}}">
   </div>
   <div class="mb-3">
   <label class="from-label">Teléfono</label>
   <!--  Provider's phone -->
    <input class="form-control" type="text" name="phone" value="{{$desiredProvider->phone}}" >
   </div>
   <div class="mb-3">
   <label class="from-label">Dirección</label>
   <!--  Provider's address -->
    <input class="form-control" type="text" name="address"  value="{{$desiredProvider->address}}" >
   </div>
   <a class="btn btn-primary" href="{{ url('/providers')}}">cancelar</a>
   <button class="btn btn-secondary" type="sudmit">actualizar</button>
</form>
@endsection

<!--
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
-->