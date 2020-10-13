<?php


echo '<h1>Merci</h1><br><strong> ' . $_GET['lastname']. '</strong>' . '<strong> ' .$_GET['firstname'] . '</strong>  de nous avoir contacté à propos de '.$_GET['sujet'];
echo '<br>';
echo 'Un de nos conseiller vous contactera soit à l\'adresse suivante <strong> ' . $_GET['email']. '</strong>  ou par téléphone au <strong> ' . $_GET['phone'] . '</strong>  dans les plus brefs délais pour traiter votre demande: <br>' . $_GET['message'];
?>