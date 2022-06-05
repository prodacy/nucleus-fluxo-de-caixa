@extends('pwa.layouts.onsen')

	
@section('pages')
<center>

	@foreach($pages as $page)
		@include('pwa.pages.'.str_replace('.blade.php','',$page->getFilename()))
	@endforeach

</center>
@endsection


@section('scripts')

	<script src="{{ asset('js/library/helpers.js') }}?{{time()}}" defer></script>
	<script src="{{ asset('js/library/Cookie.js') }}?{{time()}}" defer></script>
	<script src="{{ asset('js/library/Form.js') }}?{{time()}}" defer></script>
	<script src="{{ asset('js/library/Api.js') }}?{{time()}}" defer></script>
	<script src="{{ asset('js/main-pwa.js') }}?{{time()}}" defer></script>

	@foreach($scripts as $script)
	<script src='{{ asset("js/onsen/{$script->getFilename()}") }}?{{time()}}'></script>
	@endforeach

@endsection