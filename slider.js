var zdj1 = document.getElementById("zdj1").value;
var zdj2 = document.getElementById("zdj2").value;
var zdj3 = document.getElementById("zdj3").value;
var zdj4 = document.getElementById("zdj4").value;
var zdj5 = document.getElementById("zdj5").value;

var nick1 = document.getElementById("nick1").value;
var nick2 = document.getElementById("nick2").value;
var nick3 = document.getElementById("nick3").value;
var nick4 = document.getElementById("nick4").value;
var nick5 = document.getElementById("nick5").value;

var aktzdj = 0;

var zdjecia = [zdj1, zdj2, zdj3, zdj4, zdj5];

var nicki = [nick1, nick2, nick3, nick4, nick5];

var dotsid = "dot"+(aktzdj+1);

var nowynick = 'user_profile.php?nazw=' + encodeURIComponent(nicki[aktzdj]);

for(var i = 1; i <= zdjecia.length; i++) {
    document.getElementById("dot" + i).style.color = "#333";
}

document.getElementById(dotsid).style.color="#c7b671";

function dalej(){
    aktzdj++;
    if(aktzdj>=zdjecia.length)
    {
        aktzdj = 0;
    }
    document.getElementById("IMG").src = zdjecia[aktzdj];
    nowynick = 'user_profile.php?nazw=' + encodeURIComponent(nicki[aktzdj]);
    document.getElementById("pnick").href = nowynick;
    document.getElementById("pnick").textContent = nicki[aktzdj];


    for(var i = 1; i <= zdjecia.length; i++) {
        document.getElementById("dot" + i).style.color = "#333";
    }

    dotsid = "dot"+(aktzdj+1);
    document.getElementById(dotsid).style.color="#c7b671";
    
}

function powrot(){
    aktzdj--;
    if(aktzdj<0)
    {
        aktzdj = zdjecia.length-1;
    }
    document.getElementById("IMG").src = zdjecia[aktzdj];
    
    nowynick = 'user_profile.php?nazw=' + encodeURIComponent(nicki[aktzdj]);
    document.getElementById("pnick").href = nowynick;
    document.getElementById("pnick").textContent = nicki[aktzdj];
    
    for(var i = 1; i <= zdjecia.length; i++) {
        document.getElementById("dot" + i).style.color = "#333";
    }

    dotsid = "dot"+(aktzdj+1);
    document.getElementById(dotsid).style.color="#c7b671";
}