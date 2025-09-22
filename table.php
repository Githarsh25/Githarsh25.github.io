<!DOCTYPE html>
<html>
<body>

<?php
$number = 48; 
echo "Multiplication Table for " . $number . "<br><br>";

for ($i = 1; $i <= 10; $i++) {
    $result = $number * $i;
    echo $number . " x " . $i . " = " . $result . "<br>";
}
?>

</body>
</html>