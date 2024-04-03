function dataiczas()
{
    var dni = ['niedziela','poniedziałek', 'wtorek','środa','czwartek','piątek', 'sobota'];
    var data = new Date();
    var dzientyg = data.getDay();
    var dzien = data.getDate();
    var miesiac=data.getMonth()+1;
    var rok = data.getFullYear();
    var hour = data.getHours();
    var minuta = data.getMinutes();
    var sekundy = data.getSeconds();
    document.getElementById("dataiczas").innerHTML="<br>"+dni[dzientyg]+", "+((dzien<10)?"0":"")+dzien+"."+((miesiac<10)?"0":"")+miesiac+"."+rok+"<br>Godzina: "+((hour<10)?"0":"")+hour+":"+((minuta<10)?"0":"")+minuta+":"+((sekundy<10)?"0":"")+sekundy;
}

setInterval("dataiczas()",1000);