
function prikaziVise(nesto){
    var id=nesto
    console.log(id)
    var neki=document.getElementById(nesto).childNodes[1].textContent;
    var opis=document.getElementById(nesto).childNodes[2].textContent;
    var izdavac=document.getElementById(nesto).childNodes[3].textContent;
    //var id=document.getElementById(nesto).childNodes[4].textContent                   nepotrebno
    neki=neki.split('  ')
    var fin=new Array();
    var ctr=0;
    for(var i=0;i<neki.length;i++){
        fin[ctr++]=neki[i].split(':');
    }
    for(var i=0;i<fin.length;i++){
        console.log("OVO JE "+i+"-TI ELEMENT:"+fin[i][1]+"\n");
    }
    var reci=new Array("Ime kompanije: ","Lokacija kompanije: ","Nivo obrazovanja: ","Tip inženjeringa: ","Prijava traje do: ","Kontakt telefon: ","Opis posla: ");
    //var url = "index.php?" + nesto + "=";
    var nekidiv=document.getElementById("vise");
    nekidiv.style.display="inline-block";
    var kontent=document.getElementById("contents");
    kontent.innerHTML="";
    kontent.innerHTML=kontent.innerHTML+"<p style='margin:0;padding:15px;color:black;opacity:1;border-bottom:3px solid #FFC312;border-radius:20px;'>"+"Ime kompanije"+"<a style='text-decoration: none;color:red;' href='kompanija.php?ime="+fin[0][1]+"'>"+fin[0][1]+"</a></p>";
    for(var i=1;i<fin.length;i++){
        kontent.innerHTML=kontent.innerHTML+"<p style='margin:0;padding:15px;color:black;opacity:1;border-bottom:3px solid #FFC312;border-radius:20px;'>"+reci[i]+fin[i][1]+"</p>";
    }
    kontent.innerHTML+="<p style='margin:0;padding:15px;color:black;opacity:1;'>"+"Opis posla: "+opis+"</p>";    //izbrisan </div>
    //popravi ovo
    kontent.innerHTML+="<p id='helper'style='display:none;'>"+nesto+"AAAAAAAAAAAAAAAAAA"+"</p>";
   return false;
}
function ugasi(){

    var nekidiv=document.getElementById("vise");
    nekidiv.style.display="none";
    return false;
}
function izmeniOglas(nesto){
    var neki=nesto;
    alert("bravo")
    console.log(nesto)
    window.location.href="promenioglas.php?id="+neki;
}
function prijaviMe(){
    var id=document.getElementById('helper').textContent
    window.location="prijava.php?id="+id;
    return false
}

function getOcena(){
    var ocena=document.getElementById('ocenaFirme').textContent
    var gde=document.getElementById('prosecnaOcena')
    Math.round(ocena * 100) / 100
    gde.textContent+=ocena
}
