<?php
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
require_once('vendor/autoload.php');
// Definiuj połączenie z serwerem webdriver. Serwer domyślnie pracuje na porcie 4444
$host = 'http://localhost:4444/';
// Uruchomienie przeglądarki Chrome:
$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
// Dla Firefox linijka ta będzie wyglądać tak:
// $driver = RemoteWebDriver::create($host, DesiredCapabilities::firefox());
// Otwarcie strony wykonywane jest poleceniem:
$driver->get('http://owsiiz.edu.pl/');
// Zamknięcie przeglądarki Chrome:
$driver->close();
$driver->quit();
// Przetestuj działanie programu uruchamiając go w konsoli:
?>