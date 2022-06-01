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
						<th width="60">Tipo</th>
						<th>Cliente</th>
						<th>Valor</th>
						<th>Vencimento</th>
						<th class="actions text-center sorting_disabled no-sort">
							<i class="fas fa-tools"></i>
						</th>
					</tr>
				</thead>
				
				<tbody>
					@foreach($bills as $bill)
					<tr>
						<th>{{$bill->id}}</th>
						<td class="text-center">
							<span class="badge badge-{{($bill->type_id==1?'danger':'success')}}">{{$bill->typeDesc}}</span>
						</td>
						<td>
							<b>{{$bill->client->name}}</b> 
							<small class="text-muted"> 
								/ {{(strlen($bill->client->nu_document)==14?'CPF':'CNPJ')}}:
								{{$bill->client->nu_document}}
								
							</small>
						</td>
						<td>
							<span class="rs {{$bill->type_id==1?'text-danger':'text-success'}}">{{$bill->amount}}</span>
						</td>
						<td>
							<span class="d-none">
								{{$bill->due}} - 
							</span>
							@if($bill->due < date('Y-m-d'))
							<span class="text-danger" title="Vencida" data-toggle='tooltip'>{{Helper::brDate($bill->due)}}</span>
							@elseif($bill->due == date('Y-m-d'))
							<span class="badge badge-warning" title="Vence hoje" data-toggle='tooltip'>{{Helper::brDate($bill->due)}}</span>
							@elseif($bill->due < date('Y-m-d',strtotime(date('Y-m-d').' + 1 month')))
							<span class="text-warning" title="Próximo ao vencimento" data-toggle='tooltip'>{{Helper::brDate($bill->due)}}</span>
							@else
							<span class="">{{Helper::brDate($bill->due)}}</span>
							@endif
						</td>

						<td class="text-center actions">
							<a href="{{route('admin.bill.edit',[$bill->id])}}" title="Editar" data-toggle='tooltip' class="mx-2 text-warning">
								<i class="fas fa-pen"></i>
							</a>
							<a href="#" title="Excluir" data-toggle='tooltip' class="mx-2 text-danger confirm">
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
