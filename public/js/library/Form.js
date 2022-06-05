var Form = { 

	percentComplete : 0,

	progress : function(value,type='downloading',jform=''){

		console.log(type,value);

		jQuery(jform).find('progress').removeClass();
		jQuery(jform).find('progress').addClass(type);
		jQuery(jform).find('progress').val(value);

		jQuery(jform).removeClass('uploading');
		jQuery(jform).removeClass('completing');
		jQuery(jform).removeClass('uploaded');
		jQuery(jform).removeClass('downloading');
		jQuery(jform).removeClass('completed');
		jQuery(jform).removeClass('error');
		jQuery(jform).addClass(type);
		if(value > 70 && value < 100) jQuery(jform).addClass('completing');
		jQuery(jform).find('.progress span').css('width',value+'%');
		jQuery(jform).find('.progress span').attr('value',value);

	},

	disable : function(jform,flag=true){

		jQuery(jform).find('input:not(.disabled)').prop('disabled',flag);
		jQuery(jform).find('select:not(.disabled)').prop('disabled',flag);
		jQuery(jform).find('textarea:not(.disabled)').prop('disabled',flag);
		jQuery(jform).find('button:not(.disabled)').prop('disabled',flag);

	},

	funcDone : function(res){},
	funcFail : function(res){},

	submit : function(jform,url,funcDone=function(){},funcFail=function(){}) {

		if(!jform instanceof jQuery) jform = jQuery(jform);

		if(typeof event != 'undefined')
			event.preventDefault();

		jform.find('input,select,textarea,button').prop('disabled',false);
		var form = jform[0];
		var data = new FormData(form);
		jform.find('input.disabled,select.disabled,textarea.disabled,button.disabled').prop('disabled',true);

		console.log('start submit form');

		btCliked = jform.find("button:focus");
		if(btCliked.length>0){
			if(typeof btCliked.attr('name') != 'undefined'){
				data.append(btCliked.attr('name'),btCliked.attr('value'));
				console.log('add-btn',btCliked.attr('name'),btCliked.attr('value'));
			}
		}

		jQuery(jform).find('progress').attr('max',100);
		
		Form.disable(jform);

		jQuery(jform).addClass('inprogress');

		Form.progress(0,'uploading',jform);

		jQuery.ajax({
			type: "POST",
			enctype: 'multipart/form-data',
			url: url,
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			timeout: 600000,
			xhr: function(){
				var xhr = new window.XMLHttpRequest();
				jQuery(jform).find('progress').removeClass('downloaded');
				xhr.upload.addEventListener("progress", function(evt){
					Form.percentComplete = parseInt( (evt.loaded / evt.total * 100), 10);
					Form.progress(Form.percentComplete,'uploading',jform);
					if(Form.percentComplete == 100) Form.progress(Form.percentComplete,'uploaded',jform);
				}, false);
				xhr.addEventListener("progress", function(e){
					console.log("in Download progress");
					if (e.lengthComputable) {
						Form.percentComplete = parseInt( (e.loaded / e.total * 100), 10);
						Form.progress(Form.percentComplete,'downloading',jform);
					}
					else{
						Form.progress(Form.percentComplete,'error',jform);
						console.log("Length not computable.");
					}
				}, false);
				return xhr;
			},
			success: function (data,textStatus,request) {

				Form.progress(Form.percentComplete,'completed',jform);
				jQuery(jform).removeClass('inprogress');
				Form.disable(jform,false);
				data.status = request.status;
				console.log("SUCCESS : ", data);
				Form.funcDone(data);
				funcDone(data);
				jQuery(jform).find('progress').prop('disabled',false);

			},
			error: function (e) {

				Form.progress(Form.percentComplete,'error',jform);
				jQuery(jform).removeClass('inprogress');
				Form.disable(jform,false);
				console.log("ERROR : ", e);
				console.log("ResponseERROR : ", e.responseJSON);
				Form.funcFail(e);
				funcFail(e);
				jQuery(jform).find('progress').prop('disabled',false);

			}
		});
	},

	post : function(url,formData,funcs=null){

		console.log('formdata',formData);

		formData2 = formData;

		jQuery.ajax({
			type: "POST",
			enctype: 'multipart/form-data',
			url: url,
			data: formData,
			processData: false,
			contentType: false,
			cache: false,
			timeout: 600000,
			xhr: function(){
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt){
					Form.percentComplete = parseInt( (evt.loaded / evt.total * 100), 10);
					console.log('upload',Form.percentComplete);
					if(funcs) execFunc(funcs+'.uploading',{id:formData.get('id'),resp:Form.percentComplete});
				}, false);
				xhr.addEventListener("progress", function(e){
					console.log("in Download progress");
					if (e.lengthComputable) {
						Form.percentComplete = parseInt( (e.loaded / e.total * 100), 10);
						console.log('downloading',Form.percentComplete);
					}
					else{
						Form.percentComplete = null;
						console.log("Length not computable.");
					}
					if(funcs) execFunc(funcs+'.downloading',{id:formData.get('id'),resp:Form.percentComplete});
				}, false);
				return xhr;
			},
			success: function (data) {

				console.log("SUCCESS : ", data);
				Form.funcDone(data);
				if(funcs) execFunc(funcs+'.success',{id:formData.get('id'),resp:data});

			},
			error: function (e) {

				console.log("ERROR : ", e);
				console.log("ResponseERROR : ", e.responseJSON);
				Form.funcFail(e);
				if(funcs) execFunc(funcs+'.error',{id:formData.get('id'),formData:formData,resp:e});

			}
		});

	}
}
