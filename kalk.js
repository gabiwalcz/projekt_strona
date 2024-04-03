function liczenie(){
    var suma=0;
    var liczba=document.getElementById("ile").value;
    var dziennie=document.getElementById("jedendziennie").checked;
    var tyg=document.getElementById("jedentyg").checked;
    var mies=document.getElementById("jedenmies").checked;
    var dwa=document.getElementById("czesciej").checked;

    if(!liczba || liczba<1 || liczba>60) alert("Błędne dane!");
            
    if(dziennie==false && tyg==false && mies==false && dwa==false) alert("Musisz coś zaznaczyć!");
            
    if(dziennie==true) suma+=liczba*30;
    if(tyg==true) suma+=25*liczba;
    if(mies==true) suma+=liczba*20;
    if(dwa==true) suma=liczba*40;

    document.getElementById("cena").innerHTML=suma.toFixed(2);
}

function clean(){
    document.getElementById("cena").innerHTML="__";
}