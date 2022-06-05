<template id="tabbar.html">
	<ons-page id="tabbar-page">
		<ons-toolbar>
			<div class="center">{{ config('app.name', 'Onsen') }}</div>
			<div class="right">
				<ons-toolbar-button onclick="fn.toggleMenu()">
					<ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
				</ons-toolbar-button>
			</div>
		</ons-toolbar>
		<ons-tabbar swipeable id="appTabbar" position="bottom">
			<ons-tab label="" icon="" page="home.html" active ></ons-tab>
		</ons-tabbar>

		<script>
			ons.getScriptPage().addEventListener('prechange', function(event) {
				if (event.target.matches('#appTabbar')) {
					event.currentTarget.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');
				}
			});
		</script>
	</ons-page>
</template>