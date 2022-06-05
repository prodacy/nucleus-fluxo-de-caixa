function execFunc(functionStr,param) {
    if(typeof functionStr == 'undefined' || !functionStr) return null;
    if(typeof functionStr == 'function') return functionStr(param);
    console.log('execFunc',functionStr);
    calls = functionStr.split('.');
    if(calls.length==1){
        if (typeof window[calls[0]] === "function" ) return window[calls[0]](param);
    }else if(calls.length==2){
        if (typeof window[calls[0]] === "object" && typeof window[calls[0]][calls[1]] === "function" ) return window[calls[0]][calls[1]](param);
    }
    return null;
}


function moeda(valor,retn=false) {
    valor = valor.toString().replace(',','.');
    valor = parseFloat(valor);
    valor = valor.toFixed(2);
    if(retn) return parseFloat(valor);
    return valor.toString().replace('.',',');
}


function rand(min,max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}