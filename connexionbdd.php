<?php
try {
  $bddGalerie = new PDO('mysql:host=localhost;dbname=u353375652_bdd', 'u353375652_admin', 'ujhPJDXasOoyJe9yLV');
}
catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
?>
