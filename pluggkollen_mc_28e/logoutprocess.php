<?php
session_start();
//stänger ner sessionen
session_destroy();

echo 'You have been logged out.';
//skickar tillbaka till startsidan.
header ('Location: index.php');
?>
