document.addEventListener('init', function(event) {
    var page = event.target;
    if(typeof page.data != "undefined" && typeof page.data.title != "undefined") page.querySelector('ons-toolbar div.center').textContent = page.data.title;
    var init = $(page).attr('init');
    if(typeof init != "undefined") execFunc(init,page);
    activePullHook();
});

var Nav = document.getElementById('appNavigator');

function page(template,data={},animation='default') {
    Nav.pushPage(template, { data: data, animation: animation });
    if($('#sidemenu').length) document.getElementById('sidemenu').close();
}

function dialog(id) {
    var elem = document.getElementById(id);
    elem.show();
}

function dialogClose(id) {
    var elem = document.getElementById(id);
    elem.hide();
}

console.log('main');

window.fn = {};

window.fn.toggleMenu = function () {
    document.getElementById('appSplitter').right.toggle();
};

window.fn.loadView = function (index) {
    document.getElementById('appTabbar').setActiveTab(index);
    document.getElementById('sidemenu').close();
};

window.fn.loadLink = function (url) {
    window.open(url, '_blank');
};

window.fn.pushPage = function (page, anim) {

    if (anim) {
        Nav.pushPage(page.id, { data: page, animation: anim });
    } else {
        Nav.pushPage(page.id, { data: page });
    }
};


function activePullHook() {

    $(document).ready(function(){ 

        var pullHooks = $('ons-pull-hook');
        // console.log(pullHooks);

        $.each(pullHooks,function(i,pullHook){

            if(!$(pullHook).hasClass('inited')){
                $(pullHook).addClass('inited');

                var icon = $(pullHook).find('ons-icon');
                pullHook.addEventListener('changestate', function (event) {
                    switch (event.state) {
                        case 'initial':
                        console.log('initial');
                        icon.attr('icon', 'fa-arrow-down');
                        icon.attr('rotate',null);
                        icon.attr('spin',null);
                        break;
                        case 'preaction':
                        console.log('preaction');
                        icon.attr('icon', 'fa-arrow-down');
                        icon.attr('rotate', '180');
                        icon.attr('spin',null);
                        break;
                        case 'action':
                        console.log('action');
                        icon.attr('icon', 'fa-spinner');
                        icon.attr('rotate',null);
                        icon.attr('spin', true);
                        break;
                    }
                });

                var act = $(pullHook).attr('action');
                if(typeof act != "undefined"){
                    pullHook.onAction = function (done) {
                        console.log('action');
                        console.log(act);
                        execFunc(act,done);
                    }
                }else{
                    console.log('action undefined')
                }

            }

        })

        

    })

}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function appLoaded() {
	// body...
}

function refresh(time=0) {
    setTimeout(function(){
        window.location.reload();
    },time);
}

function onsAlert(message) {
    ons.notification.alert(message);
}

function onsToast(message,time=null) {
    if(typeof message == 'string') message = {message:message};
    var m = Object.assign({},{buttonLabel: 'OK', timeout: 5000},message);
    console.log(m);
    ons.notification.toast(m)
}

function errosResponse(resp) {

    console.log('erro errosResponse',resp);

    if(
        resp.status==419
        || resp.status==0
        )
    {
        onsAlert('Necessário recarregar página');
        refresh(2);
    }

    if(resp.status==400){
        onsAlert('Necessário refazer o login');
        Cookie.remove('auth');
        User.showLogin();
    }

    if(typeof resp.responseJSON != 'undefined'){

        if(typeof resp.responseJSON.message != 'undefined' && resp.responseJSON.message.toLowerCase().indexOf('csrf')>-1){
            onsAlert('Necessário recarregar página');
            refresh(2);
        }
        if(typeof resp.responseJSON.error != 'undefined'){
            onsAlert(resp.responseJSON.error);
        }

    }
}

function checkFormsRequired() {

    $.each($('form'),function(i,form_el){

        $.each($(form_el).find('.required input, .required select, .required textarea'),function(i,input){
            var val = $(input).val();
            var parentRequired = $(input);
            for (var i = 0; i < 10; i++) {
                parentRequired = parentRequired.parent();
                if(parentRequired.hasClass('required')) break;
            }

            if(val){
                parentRequired.addClass('valid');
            }else{
                parentRequired.removeClass('valid');
            }

        })

        setTimeout(function(){
            if($(form_el).find('.required:not(.valid)').length){
                $(form_el).find('button').prop('disabled',true);
            }else{
                $(form_el).find('button').prop('disabled',false);
            }
        },200);

    })

}

function showToasts(toasts) {
    $.each(toasts,function(i,el){
        onsToast(el);
    })
}

Api.callback.done = function(res){
    if(typeof res.toasts != "undefined") showToasts(res.toasts);
}

Api.callback.fail = function(res){
   errosResponse(res)
}


$(document).ready(function(){

    $('body').on('change','input[type=range]',function(e){
        var val = $(this).val();
        $(this).parent().next('.range-value').html(val);
    })


    $('body').on('change','.required input, .required select, .required textarea',function(e){

        checkFormsRequired();

    })


})


var Componente = {

    loading : `<ons-icon size="22px" spin='true' icon="fa-spinner"></ons-icon>`

}


// page("login.html");
// page("visita.lista.html");
// page("visita.nova.html");
// page("bairro.lista.html");

// $(document).ready(function(){ fn.loadView(2); })