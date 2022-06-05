<template id="home.html">
	<ons-page init="Home.init">

		<ons-toolbar>
			<div class="center">{{ config('app.name', 'App') }}</div>
			<div class="right">
				<ons-toolbar-button onclick="fn.toggleMenu()">
					<ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
				</ons-toolbar-button>
			</div>
		</ons-toolbar>

		<ons-pull-hook threshold-height="120px" action='Home.pullHook'>
			<ons-icon size="22px" class="pull-hook-content" icon="fa-arrow-down"></ons-icon>
		</ons-pull-hook>


		<div class="container text-center pt-4">

			<div class="card shadow conta-mes toup-in-slow">
				<div class="card-body text-center">

					<div class="row">
						<div class="col">
							<div class="fs-2 text-success receber text-font2 rs">-</div>
							<small class="text-muted">à Receber</small>
						</div>
						<div class="col">
							<div class="fs-2 text-danger pagar text-font2 rs">-</div>
							<small class="text-muted">à Pagar</small>
						</div>
					</div>

				</div>
				<div class="card-footer text-muted text-center">
					<small>Este mês</small>
				</div>
			</div>

			<div class="p-2 text-start bairros-andamento"></div>

		</div>

		<small class="text-muted">{sincronização não implementada}</small>

		<div class="p-5">
			<canvas id="chart_1" width="100%" height="200"></canvas>
		</div>


		<ons-speed-dial position="bottom right" direction="up" :open.sync="spdOpen">
			<ons-fab>
				<ons-icon icon="md-plus"></ons-icon>
			</ons-fab>
			<ons-speed-dial-item class='bg-success' onclick="page('conta.nova.html',{title:'Conta'})">
				<ons-icon icon="dollar-sign"></ons-icon>
			</ons-speed-dial-item>
			<ons-speed-dial-item class='bg-info' onclick="page('cliente.novo.html',{title:'Cliente'})">
				<ons-icon icon="user-tie"></ons-icon>
			</ons-speed-dial-item>
		</ons-speed-dial>


	</ons-page>
</template>