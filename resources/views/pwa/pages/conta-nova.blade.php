<template id="conta.nova.html">
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


						<ons-list-item class="input-items amount required">
							<div class="left label">
								<ons-icon icon="dollar-sign" class="list-item__icon"></ons-icon>
							</div>
							<label class="center">
								<input name="amount" class='w-100 input-amount form-control' placeholder="0,00" float>
								<div class='valid-feedback'></div><div class='invalid-feedback'></div>
							</label>
						</ons-list-item>

						<ons-list-item class='required'>
							<div class="left label"> Tipo </div>
							<div class="center">
								<ons-select class="w-100">
									<option selected disabled value="">Selecione</option>
									<option value="1">À Pagar</option>
									<option value="1">À Receber</option>
								</ons-select>
							</div>
						</ons-list-item>

						<ons-list-item class='required'>
							<div class="left label"> Vencimento </div>
							<div class="center">
								<ons-input name="die" type="date" float></ons-input>
							</div>
						</ons-list-item>
						<ons-list-item class='required'>
							<div class="left label"> Cliente </div>
							<div class="center">
								<ons-select class="w-100">
									<option selected disabled value="">Selecione</option>
									<option value="1">Primeiro cliente</option>
									<option value="1">Segundo cliente</option>
									<option value="1">Não implementado</option>
								</ons-select>
							</div>
						</ons-list-item>

					</ons-list>
				</ons-card>


				<p class="pt-4 p-3 pb-4 text-end">
					<span class="d-inline-block">
						<button class='button btn btn-sm btn-primary btn-icon-split text-center' disabled onclick="Home.inativo(); return false;">
							<div class="text">Próximo</div>
							<ons-icon icon="fa-arrow-right"></ons-icon>
						</button>
					</span>
				</p>
			</form>


		</div>

	</ons-page>
</template>