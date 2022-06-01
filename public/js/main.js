$(document).ready(function(){

	$('[data-toggle="tooltip"]').tooltip(); 

	$.each($('.dataTable'),function(i,dataTable){

		if(!$.fn.dataTable.isDataTable( $(dataTable) )){
			$(dataTable).DataTable(dataTableConfig);

			$(dataTable).find('tbody').on( 'click', 'tr', function () {
				$(this).toggleClass('selected');
			} );

		}
	});

	$('body').on('click', '.confirm', function(e) {
		
		var href = $(this).attr('href');
		if(typeof href == 'undefined') var href = $(this).parent().attr('href');
		console.log(href);

		e.preventDefault();
		$('#confirm').modal({
			backdrop: 'static',
			keyboard: false
		})
		.on('click', '.yes', function(e) {
			window.location.href = href;
		})
		.on('click', '.no', function(e) {
			e.preventDefault();
			$('#confirm').modal('hide');
		});
	});



	$(document).ready(function(){

		$("body").on("click", "api", function(e){

			var method = $(this).data('method');
			var endpoint = $(this).data('endpoint');
			var data = $(this).data('data');

			if(typeof endpoint == 'undefined') return toast('Endpoint not defined','404 - APi Service',3000,'danger');
			if(typeof method == 'undefined') method = 'GET';
			if(typeof data == 'undefined') data = '{}';

			data = JSON.parse(data);

			Api.go(
				endpoint,
				data,
				function(response) {
					if(typeof response.toasts != "undefined"){
						$.each(response.toasts,function(i,el){
							if(typeof el == 'object') toast(el.message,el.title,el.delay,el.type); else toast(el);
						})
					}
					setTimeout(function(){
						window.document.href = window.document.href;
					},2000)
				},
				function(response) {
					if(typeof response.toasts != "undefined"){
						$.each(response.toasts,function(i,el){
							if(typeof el == 'object') toast(el.message,el.title,el.delay,el.type); else toast(el);
						})
					}
				},
				method
				);


		})

	})

})

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		'Access-Control-Allow-Origin':'*',
	}
});


function ierror(el){
	$(el).parent().addClass('pload-error');
}

function iload(el){
	$(el).parent().height('auto').removeClass('pload');
}

function getImg(src,h=100){
	return '<span class="img pload"> <img height="'+h+'" onerror="ierror(this)" onload="iload(this)" src="'+src+'"> </span>';
}

function toast(message,title='',delay=3000,type='white'){

	var ago = 'agora';
	var toastId = 'toast-'+Date.now();

	var toast = `<div class="toast toast-${type}" id="${toastId}" role="alert" aria-live="assertive" aria-atomic="true" data-delay="${delay}">
	<div class="toast-header">
	<strong class="mr-auto">${title}</strong>
	<small class="ago">${ago}</small>
	<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>
	<div class="toast-body">
	${message}
	</div>
	</div>`;

	console.log(message,title,type);

	$('.toasts').prepend(toast);
	$(`#${toastId}`).toast('show').on('hidden.bs.toast', function () {$(this).remove();});

}

