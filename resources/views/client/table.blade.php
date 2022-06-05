@include('layouts.messages')

<div class="card shadow mt-4 show-down">
	<div class="card-header py-2">
		<h6 class="m-0 my-2 font-weight-bold text-primary">Registros</h6>
	</div>
	<div class="card-body p-sm-auto py-sm-auto">
		<div class="table table-responsive">
			<table class="table table-bordered dataTable table-sm" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="10">#</th>
						<th>Nome / Razão social</th>
						<th>Documento</th>
						<th class="actions text-center sorting_disabled no-sort">
							<i class="fas fa-tools"></i>
						</th>
					</tr>
				</thead>
				
				<tbody>
					@foreach($clients as $client)
					<tr>
						<th>{{$client->id}}</th>

						<td>{{$client->name}}</td>
						<td>{{(strlen($client->nu_document)==14?'CPF':'CNPJ')}}: {{$client->nu_document}}</td>
						

						<td class="text-center actions">
							<a href="{{route('admin.client.edit',[$client->id])}}" title="Editar" data-toggle='tooltip' class="mx-2 text-warning">
								<i class="fas fa-pen"></i>
							</a>
							<a href="{{route('admin.client.destroy',$client->id)}}" title="Excluir" data-toggle='tooltip' class="mx-2 text-danger confirm">
								<i class="fas fa-trash"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
