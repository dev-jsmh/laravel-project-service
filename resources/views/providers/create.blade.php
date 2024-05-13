@extends('layouts.app')

@section('title', 'crear producto')



@section('content')

<h2>Create new product</h2>
<form action="">
   <div class="mb-3">
   <label class="from-label">Nombre</label>
    <input class="form-control" type="text">
   </div>
   <div class="mb-3">
   <label class="from-label">Modelo</label>
    <input class="form-control" type="text">
   </div>
   <div class="mb-3">
   <label class="from-label">Descripción</label>
    <textarea class="form-control"></textarea>
   </div>
</form>
@endsection