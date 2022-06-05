<template id="cliente.novo.html">
	<ons-page>

		<ons-toolbar>
			<div class="left">
				<ons-back-button></ons-back-button>
			</div>
			<div class="center"></div>
		</ons-toolbar>

		<div class="">

			<h2 class="text-center m-3">Cadastro</h2>

			<form class="contanova" method="post" >

				<ons-card class="todown-in-slow">
					
					<ons-list>

						<ons-list-item class="input-items name required">
							<label class="center">
								<input name="name" class='w-100 input-name form-control' placeholder="Nome / Razão Social" float>
								<div class='valid-feedback'></div><div class='invalid-feedback'></div>
							</label>
						</ons-list-item>

						<ons-list-item class="input-items nu_document required">
							<label class="center">
								<input name="nu_document" class='w-100 input-nu_document form-control' placeholder="CPF / CNPJ" float>
								<div class='valid-feedback'></div><div class='invalid-feedback'></div>
							</label>
						</ons-list-item>


					</ons-list>
				</ons-card>


				<p class="pt-4 p-3 pb-4 text-center">
					<span class="d-inline-block">
						<button class='button btn btn-sm btn-success btn-icon-split text-center' disabled onclick="Home.inativo(); return false;">
							<ons-icon icon="fa-save"></ons-icon>
							<div class="text">Salvar</div>
						</button>
					</span>
				</p>
			</form>


		</div>

	</ons-page>
</template>