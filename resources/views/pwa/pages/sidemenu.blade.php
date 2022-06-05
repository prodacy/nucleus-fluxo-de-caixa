<template id="sidemenu.html">
	<ons-page>
		<div class="profile-pic p-5">
			<img src="https://nucleus.eti.br/wp-content/themes/nucleus/assets/images/logo.png" height="20px" class='img-fluid'>
		</div>

		<ons-list-title>Menu</ons-list-title>
		<ons-list>

			<ons-list-item onclick="fn.toggleMenu()">
				<div class="left">
					<ons-icon fixed-width class="list-item__icon" icon="ion-home, material:md-home"></ons-icon>
				</div>
				<div class="center">
					Home
				</div>
			</ons-list-item>
			<ons-list-item onclick="Home.inativo()">
				<div class="left">
					<ons-icon fixed-width class="list-item__icon" icon="dollar-sign"></ons-icon>
				</div>
				<div class="center">
					Fluxo de Caixa
				</div>
			</ons-list-item>
			<ons-list-item onclick="Home.inativo()">
				<div class="left">
					<ons-icon fixed-width class="list-item__icon" icon="user-tie"></ons-icon>
				</div>
				<div class="center">
					Clientes
				</div>
			</ons-list-item>
			
		</ons-list>

		<div class="mt-5">

			<div class="row px-4">
				<div class="col-auto d-flex align-items-center"><ons-icon fixed-width class="list-item__icon text-primary" icon="user"></ons-icon></div>
				<div class="col ps-0 text-start">
					<div class="text-primary user-name">{name}</div>
					<small class="text-muted user-last_name">{last_name}</small>
				</div>
				<div class="col-12">
					<hr>
					<div class="text-danger text-end" onclick="User.logout()">
						<small>
							<i class="fas fa-sign-out-alt"></i>
							Logout
						</small>
					</div>
				</div>
			</div>


		</div>


<!-- 		<div class="mt-5">

			<ons-list-item onclick="Utils.Screen.Toggle()">
				<div class="center">
					<span class="btn btn-light text-end text-info w-100">
						Full Mode
						<ons-icon class="list-item__icon me-2" icon="expand-arrows-alt"></ons-icon>
					</span>
				</div>
			</ons-list-item>

		</div> -->


		<script>
			ons.getScriptPage().onInit = function() {
				this.parentElement.setAttribute('animation', ons.platform.isAndroid() ? 'overlay' : 'reveal');
			};
		</script>

		<style>
			.profile-pic {
				width: 100%;
				background-color: #fff;
				margin-bottom: 40px;
				/*border: 1px solid #999;*/
				/*border-radius: 4px;*/
			}

			.profile-pic > img {
				display: block;
				max-width: 100%;
			}

			ons-list-item {
				color: #444;
			}
		</style>
	</ons-page>
</template>