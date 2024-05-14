
@extends('layouts.app')
@section('title', 'index')
@section('content')

<!-- button for add information of new providers -->
<a class="btn btn-success my-3" href="{{ url('/providers/create')}}">Crear</a>

<h2 class="mb-2">Proveedores</h2>

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        @foreach($providers as $provider)
        <tr>
            <th scope="row">{{ $provider->id }}</th>
            <td>{{ $provider->name }}</td>
            <td>{{ $provider->phone }}</td>
            <td>{{ $provider->address }}</td>
            <td class="d-flex">
                <a class="btn btn-warning m-2" href="{{ url('/providers/' . $provider->id . '/details') }}"> <i class="bi bi-eye"></i> </a>
                <!-- use a form here to delete a provider using the get method just in order to triger the endpoint -->
                <form class="m-2" action="{{ url('/providers/' . $provider->id . '/delete') }}" method="GET">
                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
<!-- 

 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 
 view to show a list of all resources of products

-->
