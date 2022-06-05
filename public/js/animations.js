// var interval = 200;
// var velocity = 500;
$(".counter-animated").each(function(i) {

    var thisAnimated = $(this);
    var percentual = thisAnimated.data('counter');
    var delay = thisAnimated.data('delay');
    var progressBar = thisAnimated.find('.progress-bar');
    var counterCont = thisAnimated.find('.counter');

    if(typeof delay == "undefined"){ delay = 0; }

    setTimeout(function(){

        thisAnimated.prop('Counter', 0).animate({
            Counter: percentual
        }, {
            duration: 500,
            easing: 'swing',
            step: function(now) {
                var per = Math.ceil(now);
                if(typeof counterCont != "undefined"){ counterCont.text(per); }
                if(typeof progressBar != "undefined"){
                    var max = progressBar.attr('aria-valuemax');
                    if(typeof max == "undefined") max = 100;
                    progressBar.width(((per/max)*100)+'%');
                    progressBar.attr('aria-valuenow',per);
                }
            }
        });

    },((200*i)+delay));

});


$(".show-down").each(function(i) {
    var alert = $(this);
    setTimeout(function(){
        alert.addClass('show');
    },(100*i));
});