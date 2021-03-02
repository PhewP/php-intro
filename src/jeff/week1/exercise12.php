<html>
    <head>
        <meta http-equiv="Content-type" content="text/html" charset="utf-8">
    </head>
    <body>
        <?php 
            $money = $_POST['money']; 
            $currency = $_POST['conversion'];
            $money = ($currency == 'pounds') ? $money * 0.86 : $money * 1.21;
            echo "The conversion is : " . $money . " " . $currency;
        ?>    
    </body>
</html>