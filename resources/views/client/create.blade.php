@extends('layouts.admin')

@section('main-content')


<div class="container">

	<h1 class="h3 mb-3 text-gray-800 d-flex justify-content-start"> 

		<div class="mr-auto">
			Novo cliente
		</div>

	</h1>

	@include('layouts.messages')
	
	<form method="POST" action="{{route('admin.client.store')}}">

		{{csrf_field()}}

		<div class="p-4 shadow">

			<div class="row">

				<div class="col-12 col-sm-8">
					<label>
						Nome / Razão social <span class="text-danger">*</span>
						<input required class="form-control" type="text" name="name" value="{{old('name')}}">
					</label>
				</div>
				<div class="col-12 col-sm-4">
					<label>
						Número do documento <span class="text-danger">*</span>
						<input required class="form-control nu_document" type="text" name="nu_document" value="{{old('nu_document')}}">
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


@section('scripts')

<script>
	$( ".nu_document" ).keyup(function() {
		if($(this).val().length<14)
			$(this).mask('000.000.000-00');
		else
			$(this).mask('00.000.000/0000-00');
	});
</script>

@endsection