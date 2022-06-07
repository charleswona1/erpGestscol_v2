function AfficherMasquer() {
    divInfo = document.getElementById('recherche');

    if (divInfo.style.display == 'none')
        divInfo.style.display = 'block';
    else
        divInfo.style.display = 'none';

}