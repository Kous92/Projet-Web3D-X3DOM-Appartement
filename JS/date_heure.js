function date_heure(id)
{
    const date = new Date;
    const annee = date.getFullYear();
    let moi = date.getMonth();
    let mois = new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    let j = date.getDate();
    const jour = date.getDay();
    let jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    let h = date.getHours();
    let resultat = "";

    if (h < 10)
    {
        h = "0"+h;
    }

    let m = date.getMinutes();

    if (m < 10)
    {
        m = "0"+m;
    }

    let s = date.getSeconds();

    if (s < 10)
    {
        s = "0"+s;
    }

    resultat = 'Nous sommes le ' + jours[jour] + ' ' + j + ' ' + mois[moi] + ' ' + annee + ', il est ' + h + ':' + m + ':' + s;

    document.getElementById(id).innerHTML = resultat;

    setTimeout('date_heure("'+id+'");','1000');

    return true;
}
