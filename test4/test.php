<?php
    namespace Facebook\WebDriver;
    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;
    require_once('vendor/autoload.php');
    $host = 'http://localhost:4444/';
    $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
    // Połącz się ze stroną formularz.php podając poprawny link do funkcji:
    $driver->get('https://www.alsen.pl/');
    
    $first_cat = $driver->findElement(WebDriverBy::cssSelector('#js-mainWrapper > header > div.b-header_secondary.clearfix2 > div > nav > ul > li:nth-child(3) > a'));
    $first_cat->click();
    $second_cat = $driver->findElement(WebDriverBy::cssSelector('#js-mainWrapper > main > div.b-container.clearfix2 > section > div.b-categories > div.b-categories_grid.js-categories_grid > div > div.m-grid_item.is-gridItem_1.js-grid_item.is-first > p > a'));
    $second_cat->click();

    $produkty = $driver->findElements(WebDriverBy::className("m-offerBox"));
    foreach($produkty as $p){
        if($p->findElement(WebDriverBy::className('m-offerBox_data'))->getText() !== ""){
            echo "______________________________".PHP_EOL;
            echo $p->findElement(WebDriverBy::className('m-offerBox_data'))->getText().PHP_EOL;
            echo "Cena: ".$p->findElement(WebDriverBy::className('m-priceBox_new'))->getText().PHP_EOL;
            echo "______________________________".PHP_EOL;
        }  
    }
    $driver->close();
    $driver->quit();
?>