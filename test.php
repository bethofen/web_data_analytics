<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    $file = fopen("btc-usdt-1h-gob.csv","r");
    $fp = file("btc-usdt-1h-gob.csv", FILE_SKIP_EMPTY_LINES);
    echo count($fp);
    echo $fp[0];
    // {
    //     print_r(fgetcsv($file)[3]);
    //     echo "<br>";
    // }
    fclose($file);

    // $file = fopen("btc-usdt-1h-gob.csv","r");

    // $row = 1;
    // if (($handle = fopen("btc-usdt-1h-gob.csv", "r")) !== FALSE) {
    //     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    //         $num = count($data);
    //         // echo "<p> $num fields in line $row: <br /></p>\n";
    //         $row++;
    //         // for ($c=0; $c < $num; $c++) {
    //         //     echo $data[$c] . "<br />\n";
    //         // }
    //     }
    //     fclose($handle);
    // }
    ?>
</body>
</html>