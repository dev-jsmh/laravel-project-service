@extends('layouts.app')

@section('title', 'crear producto')



@section('content')

<h2 class="my-4">Nuevo producto</h2>
<!-- takes user back to the index -->
<a class="btn btn-success" href="{{ url('/products')}}">Go back</a>
<!-- url where form makes post request -->
<form class="mt-4" action="{{ url('/products/store')}}" method="post">
   @csrf
   <div class="mb-3">
   <label class="from-label">Nombre</label>
    <input class="form-control" type="text" name="name" >
   </div>
   <div class="mb-3">
   <label class="from-label">Modelo</label>
    <input class="form-control" type="text" name="model" >
   </div>
   <div class="mb-3">
   <label class="from-label">Descripción</label>
    <input class="form-control" type="text" name="description">
   </div>
   <!-- link that point back to the index in case user wants to cancel the operation -->
   <a class="btn btn-primary" href="{{ url('/products')}}">cancelar</a>
   <!-- button to sudmit the form data -->
   <button class="btn btn-secondary" type="sudmit">crear</button>
</form>
@endsection

<!--

 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 -->