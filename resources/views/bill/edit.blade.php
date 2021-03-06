@extends('layouts.admin')

@section('main-content')

<div class="container">
	
	<h1 class="h3 mb-0 text-gray-800 d-flex justify-content-start"> 

		<div class="mr-auto">
			Editar conta
		</div>

	</h1>

	<div class="text-muted mb-3">
		#id {{$bill->id}} / {{$bill->client->name}} / {{(strlen($bill->client->nu_document)==14?'CPF':'CNPJ')}}: {{$bill->client->nu_document}}
	</div>


	@include('layouts.messages')
	
	<form method="POST" action="{{route('admin.bill.update',[$bill->id])}}">

		{{csrf_field()}}

		<div class="p-4 shadow">

			<div class="row">

				<div class="col-12 col-sm-2">
					<label>
						Tipo <span class="text-danger">*</span>
						<select class="form-control" required name="type_id">
							<option selected disabled value="">Selecione</option>
							@foreach($bill_types as $id => $type)
							<option value="{{$id}}" {{($bill->type_id==$id?'selected':'')}} >{{$type}}</option>
							@endforeach
						</select>
					</label>
				</div>
				<div class="col">
					<label>
						Cliente <span class="text-danger">*</span>
						<select class="form-control" required name="client_id">
							<option selected disabled value="">Selecione</option>
							@foreach($clients as $client)
							<option value="{{$client->id}}" {{($bill->client_id==$client->id?'selected':'')}}>{{$client->name}} / {{(strlen($client->nu_document)==14?'CPF':'CNPJ')}}: {{$client->nu_document}}</option>
							@endforeach
						</select>
					</label>
				</div>
				<div class="col-12 col-sm-3">
					<label>
						Vencimento <span class="text-danger">*</span>
						<input required class="form-control" type="date" name="due" value="{{$bill->due}}">
					</label>
				</div>
				<div class="col-12 col-sm-3">
					<label>
						Valor <span class="text-danger">*</span>
						<input required class="form-control" type="number" name="amount" step="0.01" value="{{$bill->amount}}">
					</label>
				</div>

			</div>

		</div>

		<div class="mt-3 text-right">
			<button class="btn btn-success btn-icon-split">
				<span class="icon"> <i class="fas fa-save"></i> </span>
				<span class="text"> Salvar </span>
			</abutton>
		</div>

	</form>
</div>


@endsection