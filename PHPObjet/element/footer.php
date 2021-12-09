<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'DoubleCompteur.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Compteur.php';

// Méthode objet
$compteur = new Compteur(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur');
$compteur2 = new DoubleCompteur(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur');
$compteur->increment();
//$vues = $compteur->recuperer();
$vues = $compteur2->recuperer();

// Méthode procédurale
//ajouterVue();
//$vues = nombreVues();
?>

<footer class="mt-auto text-white-50" id="black">
    <p>Nombre de visite<?php if ($vues > 1): ?>s<?php endif ?> sur le site : <?= $vues ?></p>
    <p>Made with &#9829; from <a href="https://www.nancy.fr" class="text-white" target="_blank">Nancy</a></p>
</footer>
</div>

</body>

</html>