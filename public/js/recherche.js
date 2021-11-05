<script type="text/javascript">
/* Voici la fonction javascript qui change la propriété "display"
pour afficher ou non le div selon que ce soit "none" ou "block". */
 
function AfficherMasquer()
{
divInfo = document.getElementById('recherche');
 
if (divInfo.style.display == 'none')
divInfo.style.display = 'block';
else
divInfo.style.display = 'none';
 
}
</script>
 
