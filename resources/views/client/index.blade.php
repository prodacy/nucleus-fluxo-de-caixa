@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-0 text-gray-800 d-flex justify-content-start"> 

	<div class="mr-auto">
	Clientes
	</div>

	<a class="btn btn-primary btn-icon-split" href="{{route('admin.client.create')}}">
		<span class="icon"> <i class="fas fa-plus"></i> </span>
		<span class="text"> Adicionar um novo </span>
	</a>

</h1>

<div class="text-muted mb-3">Contas</div>

@include('client.table')

@endsection