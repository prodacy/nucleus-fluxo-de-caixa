var Api = {

	isDebug : true
	,prfAlert : 'alert'

	,get : function(func,dados,funcDone2=function(){},funcFail2=function(){}){
		Api.go(func,dados,funcDone2,funcFail2,'GET');
	}

	,post : function(func,dados,funcDone2=function(){},funcFail2=function(){}){
		Api.go(func,dados,funcDone2,funcFail2,'POST');
	}

	,put : function(func,dados,funcDone2=function(){},funcFail2=function(){}){
		Api.go(func,dados,funcDone2,funcFail2,'PUT');
	}

	,go : function(func,dados,funcDone2=function(){},funcFail2=function(){},type='POST'){

		if(func.substring(0,4)!='http') var func = HOST+'api/'+func;

		jQuery.ajax({
			type: type,
			url: func,	
			cache: false,
			// dataType: 'jsonp',
			data: dados,
			crossDomain: true,
		}).done(function( res ) {
			Api.log('service:'+func);
			Api.log(res);
			funcDone2(res);
			Api.funcDone(res);
		}).fail( function (res,res2) {
			Api.log('service:'+func);
			Api.log('super error');
			Api.log('res',res);
			Api.log('res2',res2);
			funcFail2(res);
			Api.funcFail(res);
			// execFunc('showOffline',{func,dados,funcDone,funcFail});
		});
	}

	,form : function(func,jform,funcDone2=function(){},funcFail2=function(){}) {
		var url = HOST+'service/'+func;
		Api.log('ServiceForm',func);
		Form.submit(jform,url,
			function(res){
				funcDone2(res);
				Api.funcDone(res);
			}
			,function(res){
				funcFail2(res);
				Api.funcFail(res);
			});
	}

	,funcDone : function(res){}
	,funcFail : function(res){}

	,log : function(a,b=null){
		if(!Api.isDebug) return;
		console.log(a,b);
	}

}