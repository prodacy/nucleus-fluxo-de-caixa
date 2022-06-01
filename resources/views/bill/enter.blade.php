@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-0 text-gray-800 d-flex justify-content-start"> 

	<div class="mr-auto">
	À Receber
	</div>

	<a class="btn btn-primary btn-icon-split" href="{{route('admin.bill.create',['type_id'=>2])}}">
		<span class="icon"> <i class="fas fa-plus"></i> </span>
		<span class="text"> Adicionar uma conta <span class="badge badge-success">à receber</span> </span>
	</a>

</h1>

<div class="text-muted mb-3">Contas</div>

@include('bill.table')

@endsection