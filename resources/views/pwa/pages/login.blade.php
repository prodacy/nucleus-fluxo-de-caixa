<div class='login' id="login">
	<div class="container text-center">

		<div class="loading todown-in-slow">
			<ons-icon icon="fa-spinner" spin="true" class="fadein-slow list-item__icon"></ons-icon>
		</div>

		<div class="middle" style="width: 85%; max-width: 400px;">
			<div class="pb-3 fs-6 text-center toup-in-slow">
				<img src="https://nucleus.eti.br/wp-content/themes/nucleus/assets/images/logo.png" height="20px" class='fadein invert'>
			</div>
			<div class="card shadow mb-5 toleft-in-slow" style="display: none;">
				<div class="card-body">
					<form method="post" class="api" action='{{route("api.login")}}' data-response='User.logged' data-presubmit='User.prelogin'>

						<div class="fw-light pb-4 fs-5 text-center label">
							L O G I N
						</div>
						<ons-input type="email" placeholder="E-mail" name='email' float class='w-100 mb-4' value='admin@admin.com'></ons-input>
						<ons-input type="password" placeholder="Senha" name='password' float class='w-100 mb-4' value='123'></ons-input>

						<div class="response"></div>

						<div class="text-center">
							
						<button class='button btn btn-sm btn-success btn-icon-split' type='submit'>
							<ons-icon icon="fa-sign-in"></ons-icon>
							<div class="text">ENTRAR</div>
						</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>