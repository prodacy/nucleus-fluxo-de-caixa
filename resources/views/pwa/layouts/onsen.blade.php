<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name', 'Onsen') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<meta name="author" content="prodacy.soares@fortaleza.ce.gov.br">

	<!-- Meta OG -->
	<meta property="og:locale" content="pt_BR">
	<meta property="og:type" content="website">
	<meta property="og:title" content="{{ config('app.name', 'Onsen') }}">
	<meta property="og:site_name" content="{{ config('app.name', 'Onsen') }}">
	<meta property="og:url" content="<?="URL"?>">
	<meta property="og:image" content="<?="URL"?>resource/imgs/logo.jpg">
	<meta property="og:description" content="{{ config('app.name', 'Onsen') }}">

	<!-- Onsen -->
	<link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
	<link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
	<script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
	<!-- https://ionic.io/ionicons -->
	<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

	<link rel='stylesheet' href="{{ asset('css/pwa/style.css') }}?{{time()}}" type='text/css'>

	<script>
		var HOST = "{{env('APP_URL')}}";
	</script>

	<meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body onload="appLoaded()">
	
	@yield('pages')

	<!-- Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<!-- jQuery UI -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

	<!-- ChartJs -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	@yield('scripts')

	<style>
		ons-splitter-side[animation=overlay] {
			border-left: 1px solid #bbb;
		}
	</style>

</body>
</html>
