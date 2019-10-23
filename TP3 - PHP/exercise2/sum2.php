

<?php 
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];

    $sum = $num1 + $num2;

?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Sum</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <h1>Sum Result</h1>

        <div>
            <a href="form2.html" > <?php echo "Sum: $sum" ?> </a>           
        </div>
    </body>
</html>



