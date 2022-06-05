var User = {

	prelogin : function(form){

		console.log(form)

		var email = $(form).find('input[type=email]');
		var password = $(form).find('input[type=password]');

		Api.header("Authorization", "Basic " + btoa(email + ":" + password));

		return true;

	},

	logged : function(resp){

		if(resp.status==200){ 
			delete resp.status;
			Cookie.set('auth',resp);
			Api.headerClear();
			Api.header("Authorization", "Bearer " + resp.access_token );
			User.hideLogin();
			User.me();
		}else{
			errosResponse(resp);
		}
		
	},

	logout : function(){

		Api.post('auth/logout',
			{},
			function(resp){
				Cookie.remove('auth');
				onsToast('Logout efetuado com sucesso');
				User.showLogin();
			})
		
	},

	me : function(callback){

		Api.post('auth/me',
			{},
			function(resp){
				User.hideLogin();
				$('.user-name').html(resp.name);
				$('.user-last_name').html(resp.last_name);
			},
			)

	},

	showLogin : function(){
		$('#login').fadeIn();
		setTimeout(function(){
			$('.login .card').show();
			$('.login .loading').hide();
		},2000)
	},

	hideLogin : function(){
		$('#login').fadeOut();
		setTimeout(function(){
			$('.login .card').hide();
			$('.login .loading').show();
		},2000)
	},

	auth : function(){

		var auth = Cookie.get('auth');

		if(!auth){
			User.showLogin();
		}else{

			Api.headerClear();
			Api.header("Authorization", "Bearer " + auth.access_token );

			User.me(function(resp){
				if(resp.status==200){
					User.hideLogin();
				}else{
					User.showLogin();
				}
			});
		}

	}

}