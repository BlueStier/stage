document.getElementById("choixPhoto").style.display = 'none';


function invisible(txt) {
    for (var i = 2; i <= 10; i++) {
        document.getElementById(txt + i).style.display = 'none';
    }
}

function visibleP(choix) {
    (choix ? document.getElementById('choixPhoto').style.display = 'block' : document.getElementById('choixPhoto').style.display = 'none');
}

function visibleC(choix) {
    (choix ? document.getElementById('ajoutCar').style.display = 'block' : document.getElementById('ajoutCar').style.display = 'none');
}


function visibleAn(choix) {
    if (choix) {
        document.getElementById('an').style.display = 'block';
        document.getElementById("doc" + nbY).style.display = 'block';
        document.getElementById("moinsAn").style.display = 'none';
    } else {
        document.getElementById('an').style.display = 'none';
        invisible('doc');
    }
}

function addYear(bool) {
    if (document.getElementById("nbY").value >= 9) {
        document.getElementById("plusAn").style.display = 'none';
    } else {
        document.getElementById("plusAn").style.display = 'inline';
    }
    if (bool) {
        document.getElementById("nbY").value = An;
        document.getElementById("doc" + An).style.display = 'block';
        An++;
    } else {
        An--;
        document.getElementById("doc" + An).style.display = 'none';
        document.getElementById("nbY").value = An - 1;
    }
    if (document.getElementById("nbY").value > initial) {
        document.getElementById("moinsAn").style.display = 'inline';
    } else {
        document.getElementById("moinsAn").style.display = 'none';
    }
}

var nbBu = parseInt(document.getElementById("nbBu").value, 10);
var initialb = nbBu;
var Pbu = nbBu + 1;

function visibleBulle(choix) {
    if (choix) {
        document.getElementById("plusbulle").style.display = 'block';
        document.getElementById("bulle" + nbBu).style.display = 'block';
    } else {
        document.getElementById("plusbulle").style.display = 'none';
        invisible('bulle');
    }
}

function addBulle(bool) {
    if (document.getElementById("nbBu").value >= 9) {
        document.getElementById("plusBu").style.display = 'none';
    } else {
        document.getElementById("plusBu").style.display = 'inline';
    }
    if (bool) {
        document.getElementById("nbBu").value = Pbu;
        document.getElementById("bulle" + Pbu).style.display = 'block';
        Pbu++;
    } else {
        Pbu--;
        document.getElementById("bulle" + Pbu).style.display = 'none';
        document.getElementById("nbBu").value = Pbu - 1;
    }
    if (document.getElementById("nbBu").value > initialb) {
        document.getElementById("moinsBu").style.display = 'inline';
    } else {
        document.getElementById("moinsBu").style.display = 'none';
    }
}