@extends('pwa.layouts.onsen')


@section('pages')

<ons-navigator id="appNavigator" swipeable swipe-target-width="80px" page="login.html"></ons-navigator>

<template id="login.html">
	<ons-page class='login'>
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

							<button class='button btn btn-sm btn-success w-100 btn-split' type='submit'>
								<ons-icon icon="fa-sign-in"></ons-icon>
								<div class="text">ENTRAR</div>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</ons-page>
</template>

@endsection


@section('scripts')

<script src="{{ asset('js/library/helpers.js') }}?{{time()}}"></script>
<script src="{{ asset('js/library/Form.js') }}?{{time()}}"></script>
<script src="{{ asset('js/library/Api.js') }}?{{time()}}"></script>
<script src="{{ asset('js/main-pwa.js') }}?{{time()}}"></script>
<script src='{{ asset("js/onsen/User.js") }}?{{time()}}'></script>

<script>
	setTimeout(function(){
		$('.card').show();
		$('.loading').hide();
	},2000)
</script>

@endsection