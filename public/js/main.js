function nasumicanFilm()
{
    let filmovi = ["Betmen","Superman","Jumanji","Blade runner 2049","Nothing hill","El Dorado","Izgubljeno blago","Avengers","Pinokio","Insidious","Black Adam","Ironman"];

    index = Math.floor(Math.random() * filmovi.length);
    document.getElementById("prikazNasumicnogFilma").innerHTML = filmovi[index];

}



function nasumicanCitat()
{
    let filmovi = [ "Star Wars, 1977","The Adventures of Sherlock Holmes, 1939","Frankenstein, 1931","The Terminator, 1984","The Lord of the Rings: Two Towers, 2002","E.T. the Extra-Terrestrial, 1982","Field of Dreams, 1989","Toy Story, 1995"];
    let citati = ["May the Force be with you.","Elementary, my dear Watson.","It's alive! It's alive!","I'll be back.","My precious.","E.T. phone home.","If you build it, he will come.","To infinity and beyond!"];
    let brojLevi = Math.floor(Math.random() * filmovi.length);
    let brojDesni = Math.floor(Math.random() * filmovi.length);
    document.getElementById('citatLevi').innerHTML = "\"" + citati[brojLevi] + "\"" ;
    document.getElementById('filmLevi').innerHTML = filmovi[brojLevi];

    while(brojDesni == brojLevi)
    {
        brojDesni = Math.floor(Math.random() * filmovi.length);
    }

    document.getElementById('citatDesni').innerHTML = "\"" + citati[brojDesni] + "\"";
    document.getElementById('filmDesni').innerHTML = filmovi[brojDesni];
}


function prikazi(nes)
{
    alert(nes);
    document.getElementById('idZaBrisanje').value= nes;
}


