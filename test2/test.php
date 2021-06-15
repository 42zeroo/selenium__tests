<?php
    namespace Facebook\WebDriver;
    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;
    require_once('vendor/autoload.php');
    $host = 'http://localhost:4444/';
    $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
    // Połącz się ze stroną formularz.php podając poprawny link do funkcji:
    $driver->get('http://localhost/selenium/test2/form.php');
    // Znajdź na otworzonej stronie element <input name="imie" ...> po nazwie (name) wpisując:
    $field1 = $driver->findElement( WebDriverBy::name('text_input') );
    $field2 = $driver->findElement( WebDriverBy::name('text_input2') );
    // Wpisz przykładowe imię do formularza:
    $field1->sendKeys("Jan");
    $field2->sendKeys("Kowalski");
    // Znajdź w podobny sposób element input name="nazwisko" odpowiedzialny za nazwisko,
    // przypisz go do zmiennej $nazwisko i wpisz przykładowe nazwisko (np. „Kowalski”). Następnie
    // znajdź element przycisk po jego id:
    $przycisk = $driver->findElement( WebDriverBy::id('submit_btn') );
    // i wykonaj kliknięcie:
    $przycisk->click();
    // Po wykonaniu tej funkcji przeglądarka wykona wysłanie danych do serwera i powinna pojawić się
    // strona z wypełnionymi danymi. Dodaj opóźnienie, alby zobaczyć rezultat, np.
    sleep(5);
    // Przetestuj program, wykonując w konsoli polecenie
    // php auto_formularz.php
    // Skrypt auto_formularz.php można wykorzystać do testowania aplikacji internetowych bez
    // ingerencji człowieka. Załóżmy, że przesyłanie danych formularza jest poprawnie wykonane wtedy,
    // gdy pojawi się na stronie napis „Wypelniono formularz:”.
    // Aby to automatycznie sprawdzić, przed zamknięciem przeglądarki ($driver->close()) zamieść
    // poniższy kod:
    echo "Czekam na rezultat". PHP_EOL;
    try {
        $driver->wait(10, 500)->until(
            WebDriverExpectedCondition::textToBePresentInElement(WebDriverBy::id('result_test'), 
            'Input1:') );
            echo "OK!". PHP_EOL;
        } catch (Exception\WebDriverException $e) {
            echo "Formularz zle wypelniony!". PHP_EOL;
        }
        echo "Koniec". PHP_EOL;
        // Na końcu zamknij przeglądarkę:
        $driver->close();
        $driver->quit();
        ?>