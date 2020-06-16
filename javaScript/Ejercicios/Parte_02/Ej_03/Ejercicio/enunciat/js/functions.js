function cookie(){
    bloqueRGPD = document.getElementById("emergenteRGPD");
    if(detectCookie("Illuminati")){
        if (getCookie("illuminati")==1){eliminarBloqueRGPD();}
    }else{
        document.getElementById("botonRGPD").addEventListener("click",function(){
        eliminarBloqueRGPD();
        setCookie("illuminati",1,365);
        })        
    }
}

function eliminarBloqueRGPD(){
    bloqueRGPD.parentNode.removeChild(bloqueRGPD);
}

cookie();