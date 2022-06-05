var Api = {

	isDebug : true,
	prfAlert : 'alert',

	headers : {},


	get : function(func,dados,funcDone2=function(){},funcFail2=function(){}){
		Api.go(func,dados,funcDone2,funcFail2,'GET');
	},

	post : function(func,dados,funcDone2=function(){},funcFail2=function(){}){
		Api.go(func,dados,funcDone2,funcFail2,'POST');
	},

	put : function(func,dados,funcDone2=function(){},funcFail2=function(){}){
		Api.go(func,dados,funcDone2,funcFail2,'PUT');
	},

	go : function(func,dados,funcDone2=function(){},funcFail2=function(){},type='POST'){

		if(func.substring(0,4)!='http') var func = HOST+'api/'+func;

		jQuery.ajax({
			type: type,
			url: func,	
			cache: false,
			// dataType: 'jsonp',
			data: dados,
			crossDomain: true,

			beforeSend : function(xhr){
				$.each(Api.headers,function(i,header){
					xhr.setRequestHeader(i,header);
				})
			},

		}).done(function( res ) {
			Api.log('Api:'+func);
			Api.log(res);
			funcDone2(res);
			Api.callback.done(res);
		}).fail( function (res,res2) {

			Api.log('ERROR',{route:func,res:res,res2:res2});

			funcFail2(res);
			Api.callback.fail(res);
		});
	},

	form : function(url,jform,funcDone2=function(){},funcFail2=function(){}) {
		if(url.substring(0,4)!='http') var url = HOST+'api/'+url;
		Api.log('FormSubmit',url);
		Form.submit(jform,url,
			function(res){
				funcDone2(res);
				Api.callback.done(res);
			}
			,function(res){
				funcFail2(res);
				Api.callback.fail(res);
			});
	},

	callback : {
		done : function(res){},
		fail : function(res){},
	},

	header : function(k,h){
		var header = {};
		header[k] = h;
		Api.headers = Object.assign({},Api.headers,header);
	},

	headerClear : function(){
		Api.headers = {};
	},


	log : function(a,b=null){
		if(!Api.isDebug) return;
		console.log(a,b);
	}

}



jQuery("body").on("submit", "form.api", function(e){
	var form = jQuery(this);
	var action = form.attr('action');
	var callbackResponse = form.data('response');
	var presubmit = form.data('presubmit');

	console.log(action);

	presubmit_status = execFunc(presubmit,form);

	if(!presubmit || typeof presubmit == 'undefined' || presubmit_status){
		Api.form(
			action
			,form
			,function(resp){
				if(callbackResponse) execFunc(callbackResponse,resp);
				if(resp.status==200){
					if(typeof resp.success != 'undefined') onsToast(resp.success);
				}else{
					if(typeof resp.error != 'undefined') onsToast(resp.error);
				}

				if(typeof resp._token != 'undefined') form.find('input[name=_token]').val(resp._token);

			}
			,function(resp){
				if(callbackResponse) execFunc(callbackResponse,resp);
				else onsToast('Erro interno');
			});

	}else{
		console.log('presubmit',presubmit_status);
	}
	e.preventDefault();
	return false;
})