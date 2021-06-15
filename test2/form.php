<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 2 - formularz</title>
</head>
<body>
    <h2 id="result_test">
    <?php
        if(isset($_POST["text_input"]) && isset($_POST["text_input2"])){
            echo "Input1: ".$_POST["text_input"].PHP_EOL;
            echo "Input1: ".$_POST["text_input2"].PHP_EOL;
        }
    ?>
    </h2>
    <form action="" method="post">
        <input type="text" name="text_input" id="text_input">
        <input type="text" name="text_input2" id="text_input2">
        <input type="submit" id="submit_btn" value="Submit">
    </form>
</body>
</html>