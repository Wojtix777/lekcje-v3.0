<?php

//Pobieranie danych z formularza
$imie = $_POST['imie'];
$wiek = $_POST['wiek'];
$zgoda = $_POST['zgoda'] || '0';


echo "<h2>Imię: $imie </h2><p> Wiek / płeć: $wiek </p> <sub>RODO: $zgoda </sub>";