<?php
$output = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $a = (float)$_POST['a'];
    $b = (float)$_POST['b'];
    $c = (float)$_POST['c'];
    
    $discriminant = ($b * $b) - (4 * $a * $c);
    
    $output = $discriminant;
    
    die($output); 
    
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discriminant Calculator</title>
</head>
<body>

    <h1>Discriminant of a quadratic equation</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        A <input type="text" name="a" placeholder="Value of a here">
        <br><br> B <input type="text" name="b" placeholder="Value of b here">
        <br><br>
        
        C <input type="text" name="c" placeholder="Value of c here">
        <br><br>
        
        <input type="submit" value="Submit">
        
    </form>

</body>
</html>