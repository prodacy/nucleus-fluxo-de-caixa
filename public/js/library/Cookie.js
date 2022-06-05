var Cookie = {

    div : '.|,',

    set : function(name,value,days=null) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }

        if(typeof value == 'object') value = JSON.stringify(value);
        if(typeof value == 'string') value = value.replaceAll(';',Cookie.div);
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }, 

    get : function(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            if(c.indexOf(Cookie.div) < -1) var c = c.replaceAll(Cookie.div,';');
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0){
                var v = c.substring(nameEQ.length,c.length);
                try {
                    v = JSON.parse(v);
                } catch (e) {
                }
                return v;
                
            }
        }
        return null;
    },

    remove : function(name) {   
        document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

}