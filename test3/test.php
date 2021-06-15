<?php
    namespace Facebook\WebDriver;
    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;
    require_once('vendor/autoload.php');
    $host = 'http://localhost:4444/';
    $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
    // Połącz się ze stroną formularz.php podając poprawny link do funkcji:
    $driver->get('https://www.google.pl/');
    
    $accept_zgody_btn = $driver->findElement(WebDriverBy::id('L2AGLb'));
    $accept_zgody_btn->click();

    $wyszukiwarka = $driver->findElement(WebDriverBy::cssSelector('body > div.L3eUgb > div.o3j99.ikrT4e.om7nvf > form > div:nth-child(1) > div.A8SBwf > div.RNNXgb > div > div.a4bIc > input'));
    $wyszukiwarka->sendKeys("php is broken");

    $button = $driver->findElement(WebDriverBy::cssSelector('body > div.L3eUgb > div.o3j99.ikrT4e.om7nvf > form > div:nth-child(1) > div.A8SBwf > div.FPdoLc.lJ9FBc > center > input.gNO89b'));
    $button->click();
    
    $howManyPages = 3;
    for($i = 0; $i<$howManyPages; $i++){
        $linki = $driver->findElements(WebDriverBy::cssSelector('div.g > div > div > div > a'));
        echo "_______________________________________________".PHP_EOL;
        echo "Znaleziono na stronie ".($i+1)." razem "  . count($linki) . " linkow" . PHP_EOL;
        echo "_______________________________________________".PHP_EOL;
        foreach ($linki as $l) {
            $h3 = $l->findElement(WebdriverBy::tagName("h3"));
            echo $h3->getText() . " ".PHP_EOL;
            echo $l->getAttribute("href") . PHP_EOL . "___________" . PHP_EOL;
        }
        echo "_______________________________________________";
        $nextBTN = $driver->findElement(WebDriverBy::id("pnnext"));
        if($i !== $howManyPages-1 ) $nextBTN->click();    
    }
  
    $driver->close();
    $driver->quit();
?>